<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    //
    public function index(){
        $items = Shop::all();
        return view('shops.index', ['items' => $items]);
    }
}
