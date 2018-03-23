<?php

namespace App\Services\Geo\Facades;

use Illuminate\Support\Facades\Facade;

class Geo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'geo';
    }
}