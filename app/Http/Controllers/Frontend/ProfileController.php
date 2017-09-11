<?php

namespace App\Http\Controllers\Frontend;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use File;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('frontend.profile.index', [
            'user' => Auth::user(),
        ]);
    }

    public function create()
    {
        return view('frontend.profile.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name'      => 'required',
            // 'nickname'   => 'nickname|unique:users,nickname',
            'phone'     => 'required',
            'city'      => 'required',
            'street'    => 'required',
            'build'     => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $path   = 'uploads/users/' . $user->id. '/';

                $name   = $file->getClientOriginalName();

                File::deleteDirectory($path);

                File::makeDirectory($path, 0777, true, true);

                $file->move($path . '/', $name);

                if (Image::make($path . 'default/' . $name)->width() > 200) {
                    Image::make($path . 'default/' . $name)->widen(200)->save();
                }

                $user->image = $path . '/' . $name;
            }
        }

        $user->fill($request->all())->save();

        $user->address()->save(new Address($request->all()));

        return redirect()->route('profile.index');
    }

    public function show($id)
    {
        // $profile = Product::find($id);

        return view('frontend.profile.show'//, ['profile' => $profile]
        );
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
