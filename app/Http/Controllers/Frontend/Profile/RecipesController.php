<?php

namespace App\Http\Controllers\Frontend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use Auth;
use App\RecipeToCategory;
use App\RecipeImage;
use App\RecipeStep;
use App\Recipe;
use File;


class RecipesController extends Controller
{
   function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {

    	return view('frontend.profile.recipe_new', [
    		'categories' => Category::where('status', '=', 1)->get(),
        ]);
    }

    public function create(Request $request)
    {
    	$user = Auth::user();
        $recipe = new Recipe;
        $recipe->name = $request->name;
        $recipe->user_id = $user->id;
        $recipe->ingredients = $request->ingredients;
        $recipe->description = $request->description;
        $recipe->image = '';
        $recipe->status = 1;
        $recipe->videos = $request->videos;
        $recipe->save();

        foreach ($request->categories as $category) {
            $recipeToCategory = new RecipeToCategory;
            $recipeToCategory->recipe_id = $recipe->id;
            $recipeToCategory->category_id = $category;
            $recipeToCategory->save();
        }

        $i = 0;
        $path   = 'uploads/recipes/' . $recipe->id. '/';
        File::deleteDirectory($path);
        File::makeDirectory($path, 0777, true, true);

        foreach($request->file('images') as $file){
            $name = $file->getClientOriginalName();
            $file->move($path, $name);
            $recipeImage = new RecipeImage;
            $recipeImage->recipe_id = $recipe->id;
            $recipeImage->image = $path . $name;
            $recipeImage->status = 1;
            $recipeImage->alt = 'recipe';
            $recipeImage->sort_order = 0;
            $recipeImage->save();
            if($i == $request->main){
                $recipe->image = $path . $name;
                $recipe->save();
            }
            $i++;
        }

        $n = 0;
        $path   = 'uploads/recipes/' . $recipe->id. '/step/';
        File::deleteDirectory($path);
        File::makeDirectory($path, 0777, true, true);

        foreach($request->file('step_images') as $step_image){
            $name = $step_image->getClientOriginalName();
            $step_image->move($path, $name);
            $recipeStep = new RecipeStep;
            $recipeStep->recipe_id = $recipe->id;
            $recipeStep->image = $path . $name;
            $recipeStep->text = $request->step_texts[$n];
            $n++;
            $recipeStep->sort_order = $n;
            $recipeStep->status = 1;
            $recipeStep->save();
        }

        return redirect()
                ->route('profile.articles');

    }

    public function edit($id)
    {

        $recipe = Recipe::where('id', $id)->with(['images', 'steps', 'categories'])->first();
        // dd($recipe->ingredients);
        return view('frontend.profile.recipe_edit',[
            'categories' => Category::where('status', '=', 1)->get(),
            'recipe' => $recipe,
        ]);

    }

    public function update(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $recipe = Recipe::find($request->id);
        $recipe->name = $request->name;
        $recipe->user_id = $user->id;
        $recipe->ingredients = $request->ingredients;
        $recipe->description = $request->description;
        $recipe->image = '';
        $recipe->status = 1;
        $recipe->videos = $request->videos;
        $recipe->save();

        foreach ($request->categories as $category) {
            $recipeToCategory = new RecipeToCategory;
            $recipeToCategory->recipe_id = $recipe->id;
            $recipeToCategory->category_id = $category;
            $recipeToCategory->save();
        }

        $i = 0;
        $path   = 'uploads/recipes/' . $recipe->id. '/';
        File::deleteDirectory($path);
        File::makeDirectory($path, 0777, true, true);

        foreach($request->file('images') as $file){
            $name = $file->getClientOriginalName();
            $file->move($path, $name);
            $recipeImage = new RecipeImage;
            $recipeImage->recipe_id = $recipe->id;
            $recipeImage->image = $path . $name;
            $recipeImage->status = 1;
            $recipeImage->alt = 'recipe';
            $recipeImage->sort_order = 0;
            $recipeImage->save();
            if($i == $request->main){
                $recipe->image = $path . $name;
                $recipe->save();
            }
            $i++;
        }

        $n = 0;
        $path   = 'uploads/recipes/' . $recipe->id. '/step/';
        File::deleteDirectory($path);
        File::makeDirectory($path, 0777, true, true);

        foreach($request->file('step_images') as $step_image){
            $name = $step_image->getClientOriginalName();
            $step_image->move($path, $name);
            $recipeStep = new RecipeStep;
            $recipeStep->recipe_id = $recipe->id;
            $recipeStep->image = $path . $name;
            $recipeStep->text = $request->step_texts[$n];
            $n++;
            $recipeStep->sort_order = $n;
            $recipeStep->status = 1;
            $recipeStep->save();
        }

        return redirect()
                ->route('profile.articles');

    }

    public function desroy()
    {

    	$recipe = Recipe::where('id', '=', $id)->delete();
        return redirect()
                ->route('profile.articles');

    }
}
