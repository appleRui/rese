<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;

class ShopController extends Controller
{
    //
    public function index()
    {
        $items = Shop::all();
        return view('shops.index', ['items' => $items]);
    }

    public function new()
    {
        return view('shops.new');
    }

    public function create(Request $request)
    {   
        $image = $request->file('image');
        Storage::disk('s3')->putFile('/', $image);
        
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        return view('shops.show', ['shop' => $shop]);
    }
    


    public function like($id)
    {
        if (!auth()->user()) {
            return view('login');
        }
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->shop_id = Shop::find($id)->id;
        $like->save();
        return redirect()->back();
    }

    public function unlike($shop_id)
    {
        if (!auth()->user()) {
            return view('login');
        }
        $like = Like::where('shop_id', $shop_id)->where('user_id', auth()->user()->id);
        $like->delete();
        return redirect()->back();
    }
}
