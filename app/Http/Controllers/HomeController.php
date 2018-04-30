<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SoldProduct;
use App\Shop;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sold_products = SoldProduct::all();
        $shops = Shop::all();
        return view('home', ['sold_products' => $sold_products, 'shops' => $shops]);
    }
}
