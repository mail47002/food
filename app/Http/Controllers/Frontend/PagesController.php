<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function show($slug)
    {
        $page = Page::findBySlug($slug);

        if ($page) {
            return view('frontend.pages.show', [
                'page' => $page
            ]);
        }

        abort(404);
    }

    public function temp($slug)
    {
        return view('frontend.temp.'.$slug);
    }
}
