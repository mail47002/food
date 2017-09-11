<?php

namespace App\Http\Controllers\Frontend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function index($slug)
    {
        $page = Page::findBySlug($slug);

        if ($page) {
            return view('frontend.pages.index', [
                'page' => $page
            ]);
        }

        return abort(404);
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function sitemap()
    {
        return view('frontend.pages.sitemap');
    }
}
