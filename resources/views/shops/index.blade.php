@extends('layouts.layout')

@section('title','ヘッダー')

@section('content')

<div class="my-5 text-center">
  <h2 class="h5 mb-3">店舗を探す</h2>
  <form class="row justify-content-center align-items-center" action="{{ route('shop.search') }}" method="get">
    <div class="mb-3 col-auto">
      <select selected class="form-control" name="prefecture_id" id="pref-form">
        <option value="0">都道府県を選択</option>
        @foreach($prefectures as $prefecture)
        <option value="{{ $prefecture['id'] }}">{{ $prefecture['prefecture'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3 col-auto">
      <select selected class="form-control" name="genre_id" id="pref-form">
        <option value="0">ジャンルを選択</option>
        @foreach($genres as $genre)
        <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3 col-auto">
      <input class="form-control" type="text" name="shop_name" placeholder="店舗名">
    </div>
    <div class="mb-3 col-auto">
      <input class="btn btn-success" type="submit" value="検索">
    </div>
  </form>
</div>

<ul class="d-flex flex-wrap justify-content-center list-unstyled">
  @foreach($items as $item)
  <li>
    <a class="text-decoration-none text-dark" href="{{ route('shop.show', ['id' => $item->id]) }}">
      <div class="card m-2" style="width: 18rem;">
        <img src={{ $item['image_url'] }} class="card-img-top" alt="...">
        <div class="card-body">
          <div class="d-flex align-content-center justify-content-center">
            <h5 class="card-title">{{ $item['name'] }}</h5>
            <!-- いいね取り消し -->
            @if(!is_null(auth()->user()) && auth()->user()->liked($item['id']))

            <form method="POST" action="{{ route('shop.unlike', ['id' => $item->id]) }}">
              @csrf
              <a class="text-decoration-none text-dark" style="margin-left: 0.5rem;" href="{{ route('shop.unlike', ['id' => $item->id]) }}" onclick="event.preventDefault();this.closest('form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                </svg>
                <span>{{ $item->likes->count() }}</span>
              </a>
            </form>

            @else

            <form method="POST" action="{{ route('shop.like', ['id' => $item->id]) }}">
              @csrf
              <a class="text-decoration-none text-dark" style="margin-left: 0.5rem;" href="{{ route('shop.like', ['id' => $item->id]) }}" onclick="event.preventDefault();this.closest('form').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                </svg>
                <span>{{ $item->likes->count() }}</span>
              </a>
            </form>

            @endif
          </div>
          <strong class="d-block card-text">ジャンル：{{ $item->genre['name'] }}</strong>
          <strong class="card-text">場所：{{ $item->prefecture['prefecture'] }}</strong>
          <p class="card-text">{{ $item['description'] }}</p>
        </div>
      </div>
    </a>
  </li>
  @endforeach
</ul>
@endsection