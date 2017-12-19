<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Recipe;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')
            ->paginate();
        // dd($recipes);
        return view('frontend.recipes.index', [
            'recipes' => $recipes
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
