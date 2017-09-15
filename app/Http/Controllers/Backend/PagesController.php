<?php

namespace App\Http\Controllers\Backend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
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

        $pages = Page::orderBy($sort, $order)->where('title', 'like', '%' . $search . '%')
            ->paginate()->appends([
                's' => $search,
                'sort' => $sort,
                'order' => $order,
            ]);

        return view('backend.pages.index', [
            'pages' => $pages
        ]);
    }

    public function create()
    {
        return view('backend.pages.create', [
            'page' => new Page
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $page = Page::create($request->all());

        return redirect()->route('admin.pages.edit', $page->id)->with('success', 'Страница успешно создана!');
    }

    public function edit($id)
    {
        $page = Page::find($id);

        if ($page) {
            return view('backend.pages.edit', [
                'page' => $page
            ]);
        }

        return redirect()->route('admin.pages.index');
    }

    public function update($id, Request $request)
    {
        $page = Page::find($id);

        if ($page) {
            $this->validateForm($request);

            $page->fill($request->all())->save();

            return redirect()->back()->with('success', 'Страница успешно обновлена!');
        }

        return redirect()->route('admin.pages.index');
    }

    public function destroy($id)
    {
        $page = Page::find($id);

        if ($page) {
            $page->delete();

            return response()->json([
                'success' => 'Страница успешно удалена!'
            ]);
        }

        return response()->json([
            'error' => 'Не удалось удалить страницу!'
        ]);
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'slug'          => 'required',
            'meta_title'    => 'required'
        ]);
    }
}
