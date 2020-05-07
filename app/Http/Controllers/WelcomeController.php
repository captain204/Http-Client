<?php

namespace App\Http\Controllers;
#use App\Services\MarketService;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showWelcomePage()
    {   
        $products = $this->marketService->getProducts();
        $categories = $this->marketService->getCategories();
        return view('welcome')->with(['products'=>$products,'categories'=>$categories,]);
        #dd($products);
    }
}

