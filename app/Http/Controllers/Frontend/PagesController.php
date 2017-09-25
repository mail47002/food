<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if ($page) {
            return view('frontend.pages.show', [
                'page' => $page
            ]);
        }

        return redirect()->back();
    }

    // For development
    public function temp($slug) {
        return view('frontend.' . $slug);
    }
}
