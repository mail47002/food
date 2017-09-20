<?php

namespace App\Http\Controllers\Frontend;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    public function show()
    {
        $faqs = Faq::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        if ($faqs) {
            return view('frontend.faqs.show', [
                'faqs' => $faqs
            ]);
        }
    }
}
