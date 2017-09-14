<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class UploadsController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {

        }
    }

}
