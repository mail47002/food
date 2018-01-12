<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\WishlistResource;
use App\UserWishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return new WishlistResource(UserWishlist::with('user')
            ->where('account_id', Auth::id())
            ->get());
    }

    public function store(Request $request)
    {
        UserWishlist::create([
            'account_id' => Auth::id(),
            'user_id'    => $request->user_id
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $user = UserWishlist::where('user_id', $id)->first();

        if ($user) {
            $user->delete();

            return response()->json([
                'status' => 'success'
            ]);
        }
    }
}
