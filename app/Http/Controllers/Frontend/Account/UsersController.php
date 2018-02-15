<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use Auth;

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
        return view('frontend.account.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $request->merge([
            'has_profile' => 1
        ]);

        Auth::user()->fill($request->all())->save();

        $address = new Address($request->all());

        Auth::user()->address()->save($address);

        return response()->json([
            'url'     => route('account.user.show'),
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $reviewsTo = Review::with('answer')
            ->whereHas('product', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('created_at')
            ->paginate();

        $reviewsFrom = Review::with([
            'product' => function ($query) {
                $query->with(['user', 'adverts']);
            },
            'answer'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at')
            ->paginate();

        return view('frontend.account.users.show', [
            'reviewsTo'   => $reviewsTo,
            'reviewsFrom' => $reviewsFrom
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('frontend.account.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validateForm($request);

        Auth::user()->address->update($request->all());
        Auth::user()->fill($request->all())->save();

        return response()->json([
            'success' => true
        ]);
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
            'name'    => 'required',
            'phone.*' => 'required',
            'city'    => 'required',
            'street'  => 'required',
            'build'   => 'required',
            'slug'    => 'sometimes|required'
        ]);
    }
}
