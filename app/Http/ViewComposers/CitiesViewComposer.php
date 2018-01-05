<?php

namespace App\Http\ViewComposers;

use App\City;
use Illuminate\View\View;

class CitiesViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cities', City::all());
    }

}
