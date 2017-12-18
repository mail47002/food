<?php

namespace App\Http\Controllers\Frontend;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    public function show()
    {
        $faqs = Faq::orderBy('sort_order', 'asc')
            ->get();

        if ($faqs) {
            return view('frontend.faqs.show', [
                'faqs' => $faqs
            ]);
        }
    }
}
