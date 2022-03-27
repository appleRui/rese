<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Prefecture;

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
        $prefectures = Prefecture::all();
        return view('shops.new', ['prefectures' => $prefectures]);
    }

    public function create(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $image = $request->file('image');
        $s3_image = Storage::disk('s3')->putFile('/shop', $image);
        $url = Storage::disk('s3')->url($s3_image);
        $form['image_url'] = $url;
        Shop::create($form);
        return redirect()->route('shop.index');
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
