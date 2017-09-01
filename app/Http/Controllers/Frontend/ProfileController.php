<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Adress;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = User::find(Auth::id());
        $adresses = Adress::find(Auth::id());

        return view('frontend.profile.index', [
            'profile' => $profile,
            'adresses' => $adresses
            ]);
    }

    public function profileProducts(){
        return view('frontend.profile.products');
    }

    public function profileArticles(){
        return view('frontend.profile.articles');
    }

    public function profileMessages(){
        return view('frontend.profile.messages');
    }

    public function profileReviews(){
        return view('frontend.profile.reviews');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $profile = Product::find($id);

        return view('frontend.profile.show'//, ['profile' => $profile]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = User::find(Auth::id());
        $adresses = Adress::find(Auth::id());
        return view('frontend.profile.edit',[
            'profile' =>$profile,
            'adresses' =>$adresses,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $user = User::find(Auth::id());
        $this->validate($request, [
            'name'                     => 'required',
            // 'nickname'                 => 'nickname|unique:users,nickname',
            'phone'                    => 'required',
            'city'                     => 'required',
            'street'                   => 'required',
            'build'                     => 'required',
        ]);

        $user->name = $request->name;
        $user->phone = json_encode($request->phone);
        $user->nickname = $request->nickname ? $request->nickname : str_random(7);
        $user->about = $request->about ? $request->about : '';
        $user->token = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $path   = 'uploads/users/' . $user->id. '/';
                $name   = $file->getClientOriginalName();
                // dd($name);
                // deleting old if exists
                File::deleteDirectory($path);

                // creating directories
                File::makeDirectory($path, 0777, true, true);

                // Save
                $file->move($path . '/', $name);

                // //Resize if needed
                if (Image::make($path . 'default/' . $name)->width() > 200)
                    Image::make($path . 'default/' . $name)->widen(200)->save();

                // Assign images
                $user->image = $path . '/' . $name;
            }
        }

        $user->save();

        $adress = new Adress();
        $adress->user_id = Auth::id();
        $adress->city = $request->city;
        $adress->street = $request->street;
        $adress->build = $request->build;

        $adress->save();
        return redirect()
                ->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
