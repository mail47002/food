<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HtmlHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'htmlhelper';
    }
}