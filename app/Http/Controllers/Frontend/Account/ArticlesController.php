<?php

namespace App\Http\Controllers\Frontend\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advice;
use App\Recipe;
use App\Category;
use Auth;
use DB;
use Session;
use Storage;

class ArticlesController extends Controller
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
        $advices = Advice::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate();

        $recipes = Recipe::where('user_id', Auth::id())
            ->with(['categories'])
            ->orderBy('created_at', 'desc')
            ->paginate();

        $categories = Category::orderBy('name', 'asc')->get();

        return view('frontend.account.articles.index', [
            'advices' => $advices,
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }
}
