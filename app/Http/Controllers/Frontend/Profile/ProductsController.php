<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index($slug, Request $request) {
        $user = User::findBySlug($slug);

        if ($user) {
            $products = Product::with('user.profile')
                ->where('user_id', $user->id)
                ->where('name', 'like', '%' . $request->search . '%')
                ->paginate();

            $categories = Category::all();

            return view('frontend.profile.products.index', [
                'user'       => $user,
                'products'   => $products,
                'categories' => $categories
            ]);
        }
    }
}
