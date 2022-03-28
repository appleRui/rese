@extends('layouts.layout')

@section('content')
<div class="new-shop__inner">
  <form class="card p-4" action="{{ route('shop.create')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="name">店舗名</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div>
      <label class="mt-3" for="genre">ジャンル</label>
      <select class="form-control" name="genre_id">
        @foreach($genres as $genre)
        <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label class="mt-3" for="prefecture">場所</label>
      <select class="form-control" name="prefecture_id">
        @foreach($prefectures as $prefecture)
        <option value="{{ $prefecture['id'] }}">{{ $prefecture['prefecture'] }}</option>
        @endforeach
    </select>
    </div>
    <div>
      <label class="mt-3" for="description">説明</label>
      <textarea type="text" name="description" class="form-control"></textarea>
    </div>
    <div>
      <label class="mt-3" for="shop_img">店舗画像</label>
      <input type="file" id="image" name="image" class="form-control">
    </div>
    <input type="submit" class="mt-3 btn btn-primary" value="送信する"></input>
  </form>
</div>
@endsection