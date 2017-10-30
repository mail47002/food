<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Review;
use Auth;
use Storage;
use Image;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::with([
            'reviews' => function ($query) {
                $query->with(['user', 'answer']);
            }, 'adverts'])
            ->orderBy('created_at')
            ->where('user_id', $id)
            ->get();

        $reviews = Review::with([
            'product' => function ($query) {
                $query->with(['user', 'adverts']);
            },
            'answer'])
            ->where('user_id', $id)
            ->get();

        return view('frontend.profile.users.show', [
            'products' => $products,
            'reviews'  => $reviews,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('frontend.profile.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->id == $id) {
            $this->validateForm($request);

            Auth::user()->address->update($request->all());
            Auth::user()->fill($request->all())->save();

            return response()->json([
                'success' => true
            ]);
        }
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

    /**
     * Validate form data.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'image'   => 'nullable',
            'name'    => 'required',
            'phone.*' => 'required',
            'city'    => 'required',
            'street'  => 'required',
            'build'   => 'required'
        ]);
    }
}
