<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $items = $user->likes;
        return view('favorite.index', ['items' => $items]);
    }
}
