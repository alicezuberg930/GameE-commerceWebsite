<?php

namespace App\View\Components;

use App\Http\Controllers\productController;
use Illuminate\View\Component;

class news extends Component
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
        $productArray = productController::getProductsByOrder("release_date", "DESC");
        return view('components.news', ["products" => $productArray]);
    }
}
