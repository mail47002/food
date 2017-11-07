<?php

namespace App\Http\Controllers\Frontend\Account;

use App\AdviceImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advice;
use Auth;
use DB;
use Session;
use Storage;

class AdvicesController extends Controller
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

        return view('frontend.account.advices.index', [
            'advices' => $advices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('frontend.account.advices.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateForm($request);

        DB::beginTransaction();

        $advice = new Advice;
        $advice->fill($request->all());
        $advice->user_id = Auth::id();
        $advice->save();

        $this->storeImages($request, $advice);

        $this->storeImage($request, $advice);

        DB::commit();

        Session::flash('advice', $advice);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advice = Advice::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advice) {
            return view('frontend.account.advices.show', [
                'advice' => $advice
            ]);
        }

        return redirect()->route('account.articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advice = advice::with(['images'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advice) {

            return view('frontend.account.advices.edit', [
                'advice'    => $advice,
            ]);
        }

        return redirect()->route('account.advices.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advice = advice::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advice) {
            $this->validateForm($request);

            DB::beginTransaction();

            $advice->fill($request->all())->save();

            $this->storeImages($request, $advice);

            $this->storeImage($request, $advice);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advice = Advice::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advice) {

            $this->deleteImages($advice);

            $advice->delete();

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'error' => 'Oops! Something wet wrong.'
        ]);
    }

    public function success()
    {
        if (Session::has('advice')) {
            return view('frontend.account.advices.success', [
                'advice' => Session::get('advice')
            ]);
        }

        return redirect()->route('account.articles.index');
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
            'images'       => 'present',
            'description'  => 'required'
        ]);
    }

    /**
     * Store advice images to storage.
     *
     * @param Request $request
     * @param $advice
     */
    protected function storeImages(Request $request, $advice)
    {
        $adviceImages = AdviceImage::where('advice_id', 0)->pluck('id')->toArray();

        $idsToInsert = array_intersect($adviceImages, $request->images);
        $idsToDelete = array_udiff($adviceImages, $request->images,'strcasecmp');

        foreach ($idsToInsert as $id) {
            $adviceImage = AdviceImage::find($id);

            if ($adviceImage) {
                $adviceImage->advice_id = $advice->id;
                $adviceImage->save();
            }
        }

        foreach ($idsToDelete as $id) {
            $adviceImage = AdviceImage::find($id);

            if ($adviceImage) {
                Storage::delete($adviceImage->thumbnail);
                Storage::delete($adviceImage->image);

                $adviceImage->delete();
            }
        }
    }

    /**
     * Store advice image to storage.
     *
     * @param Request $request
     * @param $advice
     */
    protected function storeImage(Request $request, $advice)
    {
        $adviceImage = AdviceImage::where('id', $request->image)
            ->where('user_id', Auth::id())
            ->where('advice_id', $advice->id)
            ->first();

        if ($adviceImage) {
            $advice->thumbnail = $adviceImage->thumbnail;
            $advice->image = $adviceImage->image;
            $advice->save();
        }
    }

    /**
     * Delete advice images from storage.
     *
     * @param $advice
     */
    protected function deleteImages($advice)
    {
        $adviceImages = AdviceImage::where('advice_id', $advice->id)
            ->where('user_id', Auth::id())
            ->get();

        if ($adviceImages) {
            foreach ($adviceImages as $adviceImage) {
                Storage::delete($adviceImage->thumbnail);
                Storage::delete($adviceImage->image);

                $adviceImage->delete();
            }
        }
    }
}
