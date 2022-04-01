<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Prefecture;
use App\Models\Like;
use App\Models\Genre;

class ShopController extends Controller
{
    //
    public function index()
    {
        $items = Shop::all();
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return view('shops.index', ['items' => $items, 'prefectures' => $prefectures, 'genres' => $genres]);
    }

    public function new()
    {
        $prefectures = Prefecture::all();
        $genres = Genre::all();
        return view('shops.new', ['prefectures' => $prefectures, 'genres' => $genres]);
    }

    public function create(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $image = $request->file('image');
        if (!empty($image)) {
            $path = Storage::disk('public')->putFile('public', $image);
            $savePath = "/storage/" . $path;
            $form['image_url'] = $savePath;
        }
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

    public function search(Request $request)
    {
        $params = $request->query();
        // $keyword = $params['prefecture_id'] . '・' . $params['shop_name'];
        $items = Shop::serach($params)->get();
        return view('shops.search', ['items' => $items]);
    }
}
