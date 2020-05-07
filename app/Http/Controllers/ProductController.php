<?php

namespace App\Http\Controllers;
#use App\Services\MarketService;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show details of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProduct($title, $id)
    {   
        $product = $this->marketService->getProduct($id);
        return view('products.show')->with(['product'=>$product]);
    }
}

