<?php

namespace App\View\Components;

use App\Http\Controllers\productController;
use App\Models\product;
use Illuminate\View\Component;

class footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.footer');
    }
}
