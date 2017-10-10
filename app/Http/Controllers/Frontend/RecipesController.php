<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use Auth;
use App\RecipeToCategory;
use App\RecipeImage;
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

        foreach($request->file() as $files){
            foreach($files as $file){
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
        }

        return redirect()
                ->route('profile.recipes');

    }

    public function edit($id)
    {

        $recipe = Recipe::where('id', $id)->with(['images'])->first();
        // dd($recipe);
        return view('frontend.profile.recipe_edit',[
            'categories' => Category::where('status', '=', 1)->get(),
            'recipe' => $recipe,
        ]);

    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $recipe = recipe::find($request->id);
        // dd($recipe);

        // $this->validate($request, [
        //     'name'                     => 'required',
        //     'phone'                    => 'required',
        //     'city'                     => 'required',
        //     'street'                   => 'required',
        //     'build'                     => 'required',
        // ]);

        $recipe->name = $request->name;

        $recipe->description = $request->description;
        $recipe->user_id = $user->id;
        $recipe->videos = json_encode($request->videos);
        $recipe->status = 1;
        $recipe->save();

        return redirect()
                ->route('profile.recipes');

    }

    public function desroy()
    {

    	$recipe = recipe::where('id', '=', $id)->delete();
        return redirect()
                ->route('profile.recipes');

    }
}
