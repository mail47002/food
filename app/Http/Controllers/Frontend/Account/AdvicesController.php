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
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $advices = Advice::where('name', 'like', '%' . $request->search . '%')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(2);


        return view('frontend.account.advices.index', [
            'advices' => $advices,
        ]);
    }

    /**
     * Display create advice form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('frontend.account.advices.create', [
        ]);
    }

    /**
     * Store new advice.
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

        $advice = Advice::create($request->all());

        foreach ($request->images as $image) {
            $adviceImage = new AdviceImage([
                'image' => $image
            ]);

            $advice->images()->save($adviceImage);
        }

        DB::commit();

        Session::flash('advice', $advice);

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
        if (Session::has('advice')) {
            return view('frontend.account.advices.success', [
                'advice' => Session::get('advice')
            ]);
        }

        return redirect()->route('account.articles.index');
    }

    /**
     * Display Advice.
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
     * Display edit advice form.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advice = Advice::with(['images'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advice) {
            return view('frontend.account.advices.edit', [
                'advice'    => $advice,
            ]);
        }

        return redirect()->route('account.articles.index');
    }

    /**
     * Update advice.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advice = Advice::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advice) {
            $this->validateForm($request);

            DB::beginTransaction();

            $advice->fill($request->all())->save();

            $advice->images()->delete();

            foreach ($request->images as $image) {
                $adviceImage = new AdviceImage([
                    'image' => $image
                ]);

                $advice->images()->save($adviceImage);
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
     * Remove advice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advice = advice::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($advice) {
            $advice->images()->delete();
            $advice->delete();

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
            'image'        => 'required',
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