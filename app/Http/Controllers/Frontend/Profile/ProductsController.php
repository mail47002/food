<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index($user, Request $request) {
        $user = User::where('slug', $user)->first();

        if ($user) {
            $products = Product::with(['user' => function ($query) use ($user) {
                    $query->where('slug', $user);
                }])
                ->where('name', 'like', '%' . $request->search . '%')
                ->paginate(2);

            $categories = Category::all();

            return view('frontend.profile.products.index', [
                'user'       => $user,
                'products'   => $products,
                'categories' => $categories
            ]);
        }
    }
}
