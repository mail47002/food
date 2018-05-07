<?php

namespace App\Http\Controllers\Frontend\Account;

use App\City;
use App\Order;
use App\ProductReview;
use App\UserProfile;
use App\UserReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Helper;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'profile.check'])
            ->except(['create', 'store']);
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
    public function create(Request $request)
    {
        $profile = UserProfile::where('user_id', Auth::id())->first();

        if ($profile) {
            return view('frontend.account.users.create');
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = UserProfile::where('user_id', Auth::id())->first();

        if ($profile) {
            $this->validateForm($request);

            $request->merge(['is_complete' => 1]);

            $profile->fill($request->all())->save();

            return response()->json([
                'url'     => route('account.user.show'),
                'success' => true
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Helper::isClientReviews()) {
            $reviews = UserReview::with('answer')
                ->where('user_id', Auth::id())
                ->paginate();
        } else {
            $reviews = ProductReview::with('answer')
                ->whereHas('product', function ($query) {
                    $query->where('user_id', Auth::id());
                })
                ->paginate();
        }

        $productReviews = ProductReview::whereHas('product', function ($query) {
                $query->where('user_id', Auth::id());
            })
                ->count();

        $userReviews = UserReview::where('user_id', Auth::id())->count();

        $hasOrder = Order::whereHas('advert', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->exists();

        return view('frontend.account.users.show', [
            'reviews'        => $reviews,
            'productReviews' => $productReviews,
            'userReviews'    => $userReviews,
            'hasOrder'       => $hasOrder
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

        $profile = Auth::user()->profile;

        $request->merge([
            'slug' => $profile->slug
        ]);

        $profile->fill($request->all())->save();

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
            'first_name' => 'required|max:255',
            'phone.*'    => 'required',
            'address'    => 'required|max:255',
            'lat'        => 'required',
            'lng'        => 'required',
            'slug'       => 'sometimes|required|max:255|alpha_num|unique:user_profiles,slug'
        ]);
    }
}
