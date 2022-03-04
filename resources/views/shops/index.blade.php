@extends('layouts.layout')

@section('title','ヘッダー')

@section('content')
<ul class="d-flex flex-wrap justify-content-center list-unstyled">
  @foreach($items as $item)
  <li>
    <a class="text-decoration-none text-dark" href="{{ route('shop.show', ['id' => $item->id]) }}">
      <div class="card m-2" style="width: 18rem;">
        <img src={{ $item['image_url'] }} class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $item['name'] }}</h5>
          <p class="card-text">{{ $item['description'] }}</p>
        </div>
      </div>
    </a>
  </li>
  @endforeach
</ul>
@endsection