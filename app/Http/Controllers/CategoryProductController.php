<?php

namespace App\Http\Controllers;
#use App\Services\MarketService;

use Illuminate\Http\Request;

class CategoryProductController extends Controller
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
    public function showProducts($title, $id)
    {   
        $products = $this->marketService->getCategoryProducts($id);
        return view('categories.products.show')->with(['products'=>$products]);
    }
}

