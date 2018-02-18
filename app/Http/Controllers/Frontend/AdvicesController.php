<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advice;

class AdvicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $advices = Advice::where('name', 'like', '%' . $request->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(2);


        return view('frontend.advices.index', [
            'advices' => $advices,
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
        $advice = Advice::with(['images'])
            ->where('slug', $slug)
            ->first();

        if ($advice) {
            return view('frontend.advices.show', [
                'advice'  => $advice,
            ]);
        }
    }
}
