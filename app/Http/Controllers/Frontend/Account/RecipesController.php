<?php

namespace App\Http\Controllers\Frontend\Account;

use App\RecipeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Recipe;
use App\RecipeStep;
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

        return view('frontend.account.recipes.create', [
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

        $request->merge([
            'user_id' => Auth::id(),
        ]);

        DB::beginTransaction();

        $recipe = Recipe::create($request->all());

        $recipe->categories()->sync($request->category);
        $recipe->steps()->sync($request->steps);

        foreach ($collection as $value) {

        }

        foreach ($request->images as $image) {
            $RecipeImage = new RecipeImage([
                'image' => $image
            ]);

            $Recipe->images()->save($RecipeImage);
        }

        DB::commit();

        Session::flash('Recipe', $recipe);

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
            return view('frontend.account.recipes.success', [
                'recipe' => Session::get('recipe')
            ]);
        }

        return redirect()->route('account.article.index');
    }

    /**
     * Display recipe.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::with(['categories', 'images', 'steps'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($recipe) {
            return view('frontend.account.recipes.show', [
                'recipe' => $recipe
            ]);
        }

        return redirect()->route('account.recipes.index');
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

            return view('frontend.account.recipes.edit', [
                'recipe'    => $recipe,
                'categories' => $categories
            ]);
        }

        return redirect()->route('account.recipes.edit');
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

            $this->storeSteps($request, $recipe);

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
            'image'       => 'present',
            'ingredient.*' => 'required',
            'description'  => 'required'
        ]);
    }

    protected function storeImage($file)
    {
        $oldFilePath = 'uploads/tmp/' . $file;
        $newFilePath = 'uploads/' . md5(Auth::id()) . '/' . $file;

        Storage::move($oldFilePath, $newFilePath);

        return $newFilePath;
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
                $recipeStep->save();
            }
        }

        foreach ($request->step_text as $key => $value) {
            $recipeText = RecipeStep::find($key);
            $recipeText->text = $value;
            $recipeText->save();
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
}
