<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\Category;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipes = Recipe::where('name', 'like', '%' . $request->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $categories = Category::orderBy('name', 'asc')->get();

        return view('frontend.recipes.index', [
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $recipe = Recipe::with(['images'])
            ->where('slug', $slug)
            ->first();

        if ($recipe) {
            return view('frontend.recipes.show', [
                'recipe'  => $recipe,
            ]);
        }
    }
}
