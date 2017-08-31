<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailClass;
use Auth;
use Mail;
use Validator;
use App\User;
use File;
use Image;
use App\Adress;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.login.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);

        if (Auth::guard('web')->attempt($this->credentials($request))) {
            $user = User::find(Auth::id());
            if($user->token){
                return redirect()
                    ->route('login.information');
                } else {
                    return redirect()
                    ->route('profile.index');
                }
        }

        return redirect()
            ->back()
            ->withLogin_error(1)
            ->withInput();
    }

    public function registration()
    {
        return view('frontend.login.registration');
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'email'                     => 'required|email|unique:users,email',
            'password'                  => 'required|min:5',
        ]);
        //запис в БД users
        $user = new User();
        $user->email = $request->email;
        $user->role_id = 1;
        $user->password = Hash::make($request->password);
        $user->token = str_random(30);
        $user->save();
        // відправка листа з токеном
        Mail::to($user->email)->send(new MailClass($user->token));

        return redirect()->route('success');
    }

    public function success()
    {
        return view('frontend.login.success');
    }

    public function validationEmail(Request $request)
    {

        $user = User::where('token', '=', $request->token)
            ->first();

        if ($user->id){
            $user->activated = 1;
            $user->save();

            return redirect()
                ->route('login');
        }
    }

    protected function credentials(Request $request)
    {
        return [
            'email'     => $request->email,
            'password'  => $request->password,
        ];
    }

    public function forgot()
    {
        return view('frontend.login.forgot');
    }

    public function information(Request $request)
    {
        return view('frontend.login.information');
    }

//http://food.loc/information?token=4bMZeKnua62PZK4zw27hSNDfxP77Cs

    public function save(Request $request)
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
                // if (Image::make($path . 'default/' . $name)->width() > 200)
                //     Image::make($path . 'default/' . $name)->widen(200)->save();

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

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('home')->withLogout(1);
    }

}
