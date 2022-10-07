<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function getProducts()
    {
        $product = new product();
        $productArray = $product::all();
        return view('index', ['ProductArray' => $productArray]);
    }

    
}
