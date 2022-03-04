<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\User;

class ShopController extends Controller
{
    //
    public function index(){

        $items = Shop::all();
        return view('shops.index', ['items' => $items]);
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        return view('shops.show', ['shop' => $shop]);
    }

    public function like($id)
    {
        if(!auth()->user()){
            return view('login');
        }
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->shop_id = Shop::find($id)->id;
        $like->save();
        $items = Shop::all();
        return redirect()->route('shop.index');
    }

    public function unlike($shop_id)
    {   
        if (!auth()->user()) {
            return view('login');
        }
        $like = Like::where('shop_id', $shop_id)->where('user_id', auth()->user()->id);
        $like->delete();
        $items = Shop::all();
        return redirect()->route('shop.index');
    }

}
