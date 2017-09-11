<?php

namespace App\Http\Controllers\Backend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('backend.pages.index', [
            'pages' => Page::paginate()
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
