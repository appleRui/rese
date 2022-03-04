@extends('layouts.layout')

@section('content')
<style>
  .shop-inneer__img {
    width: 100%;
    height: 500px;
    background-size: cover;
    background-position: center;
    background-image: url("{{ $shop->image_url }}");
  }
</style>

<div class="shop-inner">
  <div class="shop-inneer__img"></div>
  <h2 class="mt-2 mb-2">{{ $shop->name }}</h2>
  <p>{{ $shop->description }}</p>
</div>

@endsection