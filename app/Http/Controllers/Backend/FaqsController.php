<?php

namespace App\Http\Controllers\Backend;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index(Request $request)
    {
        $search     = $request->has('s') ? $request->s : '';
        $sort       = $request->has('sort') ? $request->sort : 'id';
        $order      = $request->has('order') ? $request->order : 'asc';

        $faqs = Faq::orderBy($sort, $order)->where('title', 'like', '%' . $search . '%')
            ->paginate()->appends([
                's' => $search,
                'sort' => $sort,
                'order' => $order,
            ]);

        return view('backend.faqs.index', [
            'faqs' => $faqs
        ]);
    }

    public function create()
    {
        return view('backend.faqs.create', [
            'faqs' => new Faq
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $fags = Faq::create($request->all());

        return redirect()->route('admin.faqs.edit', $fags->id)->with('success', 'Раздел успешно создана!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $faqs = Faq::find($id);

        if ($faqs) {
            return view('backend.faqs.edit', [
                'faqs' => $faqs
            ]);
        }

        return redirect()->route('admin.faqs.index');
    }

    public function update($id, Request $request)
    {
        $faqs = Faq::find($id);

        if ($faqs) {
            $this->validateForm($request);

            $faqs->fill($request->all())->save();

            return redirect()->back()->with('success', 'Раздел успешно обновлен!');
        }

        return redirect()->route('admin.faqs.index');
    }

    public function destroy($id)
    {
        //
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required'
        ]);
    }
}
