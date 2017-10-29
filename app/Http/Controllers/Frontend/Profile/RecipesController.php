<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\RecipeImage;
use App\RecipeToCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Recipe;
use Auth;
use DB;
use Session;
use Storage;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display create recipe form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('frontend.profile.recipes.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store new recipe.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        DB::beginTransaction();

        $recipe = new Recipe;
        $recipe->fill($request->all());
        $recipe->user_id = Auth::id();
        $recipe->save();

        $this->storeCategories($request, $recipe);

        $this->storeImages($request, $recipe);

        $this->storeImage($request, $recipe);

        $this->storeSteps($request, $recipe);

        DB::commit();

        Session::flash('recipe', $recipe);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the success resource.
     *
     */
    public function success()
    {
        if (Session::has('recipe')) {
            return view('frontend.profile.recipes.success', [
                'recipe' => Session::get('recipe')
            ]);
        }

        return redirect()->route('profile.recipes.index');
    }

    /**
     * Display recipe.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipe) {
            return view('frontend.profile.recipes.show', [
                'recipe' => $recipe
            ]);
        }

        return redirect()->route('profile.recipes.index');
    }

    /**
     * Display edit recipe form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::with(['categories', 'images', 'steps'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipe) {
            $categories = Category::orderBy('name', 'asc')->get();

            return view('frontend.profile.recipes.edit', [
                'recipe'    => $recipe,
                'categories' => $categories
            ]);
        }

        return redirect()->route('profile.recipes.edit');
    }

    /**
     * Update recipe.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipe) {
            $this->validateForm($request);

            DB::beginTransaction();

            $recipe->fill($request->all())->save();

            $recipe->categories()->delete();

            $this->storeCategories($request, $recipe);

            $this->storeImages($request, $recipe);

            $this->storeImage($request, $recipe);

            // $this->storeSteps($request, $recipe);

            DB::commit();

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'error' => 'Oops! Something wet wrong.'
        ]);
    }

    /**
     * Remove recipe.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::with('categories')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipe) {
            $recipe->categories()->delete();

            $this->deleteImages($recipe);

            $recipe->delete();

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'error' => 'Oops! Something wet wrong.'
        ]);
    }

    /**
     * Validate form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'category'     => 'present',
            'images'       => 'present',
            'ingredient.*' => 'required',
            'description'  => 'required'
        ]);
    }

    protected function storeCategories(Request $request, $recipe)
    {
        foreach ($request->category as $category) {
            RecipeToCategory::create([
                'recipe_id'  => $recipe->id,
                'category_id' => $category
            ]);
        }
    }

    /**
     * Store recipe images to storage.
     *
     * @param Request $request
     * @param $recipe
     */
    protected function storeImages(Request $request, $recipe)
    {
        $recipeImages = RecipeImage::where('recipe_id', 0)->pluck('id')->toArray();

        $idsToInsert = array_intersect($recipeImages, $request->images);
        $idsToDelete = array_udiff($recipeImages, $request->images,'strcasecmp');

        foreach ($idsToInsert as $id) {
            $recipeImage = RecipeImage::find($id);

            if ($recipeImage) {
                $recipeImage->recipe_id = $recipe->id;
                $recipeImage->save();
            }
        }

        foreach ($idsToDelete as $id) {
            $recipeImage = RecipeImage::find($id);

            if ($recipeImage) {
                Storage::delete($recipeImage->thumbnail);
                Storage::delete($recipeImage->image);

                $recipeImage->delete();
            }
        }
    }

    /**
     * Store recipe image to storage.
     *
     * @param Request $request
     * @param $recipe
     */
    protected function storeImage(Request $request, $recipe)
    {
        $recipeImage = RecipeImage::where('id', $request->image)
            ->where('user_id', Auth::id())
            ->where('recipe_id', $recipe->id)
            ->first();

        if ($recipeImage) {
            $recipe->thumbnail = $recipeImage->thumbnail;
            $recipe->image = $recipeImage->image;
            $recipe->save();
        }
    }

    /**
     * Store recipe image to storage.
     *
     * @param Request $request
     * @param $recipe
     */
    protected function storeSteps(Request $request, $recipe)
    {
        $recipeSteps = RecipeStep::where('recipe_id', 0)->pluck('id')->toArray();

        $idsToInsert = array_intersect($recipeSteps, $request->step_images);
        $idsToDelete = array_udiff($recipeSteps, $request->step_images,'strcasecmp');

        foreach ($idsToInsert as $id) {
            $recipeStep = RecipeStep::find($id);

            if ($recipeStep) {
                $recipeStep->recipe_id = $recipe->id;
                $recipeStep->text = $request->step_texts[$id];
                $recipeStep->save();
            }
        }

        foreach ($idsToDelete as $id) {
            $recipeStep = RecipeStep::find($id);

            if ($recipeStep) {
                Storage::delete($recipeStep->thumbnail);
                Storage::delete($recipeStep->Step);

                $recipeStep->delete();
            }
        }
    }

    /**
     * Delete recipe images from storage.
     *
     * @param $recipe
     */
    protected function deleteImages($recipe)
    {
        $recipeImages = RecipeImage::where('recipe_id', $recipe->id)
            ->where('user_id', Auth::id())
            ->get();

        if ($recipeImages) {
            foreach ($recipeImages as $recipeImage) {
                Storage::delete($recipeImage->thumbnail);
                Storage::delete($recipeImage->image);

                $recipeImage->delete();
            }
        }
    }
}
