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
     * Display create Recipe form.
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
     * Store new Recipe.
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

        foreach ($request->images as $image) {
            $recipeImage = new RecipeImage([
                'image' => $image
            ]);

            $recipe->images()->save($recipeImage);
        }

        foreach ($request->step_text as $value) {
            $step_text[] = $value;
        }

        $i = 0;
        foreach ($request->step_image as $step_image) {
            $recipeStep = new RecipeStep([
                'image' => $step_image,
                'text'  => $step_text[$i],
                'sort_order' => $i + 1
            ]);
            $i++;
            $recipe->steps()->save($recipeStep);
        }

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
            return view('frontend.account.recipes.success', [
                'recipe' => Session::get('recipe')
            ]);
        }

        return redirect()->route('account.articles.index');
    }

    /**
     * Display Recipe.
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
            return view('frontend.account.recipes.show', [
                'recipe' => $recipe
            ]);
        }

        return redirect()->route('account.recipes.index');
    }

    /**
     * Display edit Recipe form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::with(['categories', 'images'])
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

        return redirect()->route('account.articles.index');
    }

    /**
     * Update Recipe.
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

            $recipe->categories()->sync($request->category);

            $recipe->images()->delete();

            foreach ($request->images as $image) {
                $recipeImage = new RecipeImage([
                    'image' => $image
                ]);

                $recipe->images()->save($recipeImage);
            }

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
     * Remove Recipe.
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
            $recipe->images()->delete();
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
            'image'        => 'required',
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
}