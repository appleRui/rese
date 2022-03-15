@extends('layouts.layout')

@section('content')
<h2 class="mt-3 mb-3">
  予約一覧
</h2>
<ul class="list-group">
  @foreach($reserves as $reserve)
  <li class="list-group-item">
    <div>
      <span>予約ID：{{ $reserve->id }}</span>
    </div>
    <div>
      <h3 class="h5">
        <strong>店名:</strong>
        {{ $reserve->shop->name }}
      </h3>
    </div>
    <div>
      <span class="d-block">予約日時: <date>{{ $reserve->start_at }}</date></span>
      <span>人数: <date>{{ $reserve->num_of_users }}</date></span>
    </div>
  </li>
  @endforeach
</ul>
@endsection