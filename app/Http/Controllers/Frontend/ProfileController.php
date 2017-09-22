<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Adress;
use App\Review;
use App\Advert;
use Hash;
use File;
use Image;
use Validator;

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

     /**
     * index page profile.
     *
     * @param
     * @return return view frontend.profile.index
     */

    public function index()
    {
        $profile = Auth::user();

        $reviewsFrom = Advert::with(['reviews' => function($query){
                $query->with(['user', 'answer']);
            }])
            ->orderBy('created_at')
            ->where('user_id', Auth::id())
            ->get();

        $reviewsTo = Review::with([
            'advert' => function($query){
                $query->with(['usermy']);
            },
            'answer'])
            ->where('user_id', Auth::id())
            ->get();

        return view('frontend.profile.index', [
            'profile' => $profile,
            'reviewsFrom' => $reviewsFrom,
            'reviewsTo' => $reviewsTo,
            ]);
    }

    public function products()
    {
        return view('frontend.profile.products', [
            'profile' => User::find(Auth::id()),
            'adresses' => Adress::where('user_id', '=', Auth::id())->first()
            ]);
    }

    public function adverts()
    {
        return view('frontend.profile.adverts', [
            'profile' => User::find(Auth::id()),
            'adresses' => Adress::where('user_id', '=', Auth::id())->first()
            ]);
    }

    public function orders()
    {
        return view('frontend.profile.orders', [
            'profile' => User::find(Auth::id()),
            'adresses' => Adress::where('user_id', '=', Auth::id())->first()
            ]);
    }

    public function reviews()
    {
        return view('frontend.profile.reviews', [
            'profile' => User::find(Auth::id()),
            'adresses' => Adress::where('user_id', '=', Auth::id())->first()
            ]);
    }

    public function messages()
    {
        return view('frontend.profile.messages', [
            'profile' => User::find(Auth::id()),
            'adresses' => Adress::where('user_id', '=', Auth::id())->first()
            ]);
    }

    public function articles()
    {
        return view('frontend.profile.articles', [
            'profile' => User::find(Auth::id()),
            'adresses' => Adress::where('user_id', '=', Auth::id())->first()
            ]);
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
        $adresses = Adress::where('user_id', '=', Auth::id())->first();
        return view('frontend.profile.edit',[
            'profile' =>$profile,
            'adresses' =>$adresses,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $user = User::find(Auth::id());
        $this->validate($request, [
            'name'                     => 'required',
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
        $user->save();

        $adress_id = Adress::where('user_id', '=', Auth::id())->first();
        $adress = Adress::find($adress_id['id']);
        $adress->city = $request->city;
        $adress->street = $request->street;
        $adress->build = $request->build;

        $adress->save();
        return redirect()
                ->route('profile.index');
    }

    public function password()
    {
        $profile = User::find(Auth::id());
        return view('frontend.profile.password', [
            'profile' => $profile,
            ]);
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, [
            'oldPassword'               => 'required',
            'password'                  => 'required',
            'password_confirmation'     => 'required|same:password',
        ]);

        $user = User::find(Auth::id());

        if (Hash::check($request->oldPassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()
                ->route('profile.index');
        } else {
            return redirect()
                ->route('profile.password',[
                    'erorr' => 'erorr old Password'
                    ]);
        }

    }

    public function nickname()
    {
        $profile = User::find(Auth::id());
        return view('frontend.profile.nickname', [
            'profile' => $profile,
            ]);
    }

    public function updateNickname(Request $request)
    {


        $this->validate($request, [
            'nickname'          => 'required|unique:users,nickname|min:3',
        ]);
        $user = User::find(Auth::id());
        $user->nickname = $request->nickname;
        $user->save();
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

    public function updatePhoto(Request $request)
    {
        $user = User::find(Auth::id());

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $path   = 'uploads/users/' . $user->id. '/';
                $name   = $file->getClientOriginalName();

                // deleting old if exists
                File::deleteDirectory($path);

                // creating directories
                File::makeDirectory($path, 0777, true, true);

                // Save
                $file->move($path, $name);
                // $file->move($path . '/', $name);

                // // //Resize if needed
                // if (Image::make($path . 'default/' . $name)->width() > 200)
                //     Image::make($path . 'default/' . $name)->widen(200)->save();

                // Assign images
                $user->image = $path . $name;
                // $user->image = $path . '/' . $name;
                $user->save();
                return 'ok';
            } else {
                return 'error validate';
            }
        }

        return 'error request';

    }
}
