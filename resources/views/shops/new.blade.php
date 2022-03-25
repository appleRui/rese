@extends('layouts.layout')

@section('content')
<div class="new-shop__inner">
  <form class="card p-4" action="{{ route('shop.create')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="datetime-local">ファイル</label>
      <input type="file" id="image" name="image" class="form-control">
    </div>
    <input type="submit" class="mt-3 btn btn-primary" value="送信する"></input>
  </form>
</div>
@endsection