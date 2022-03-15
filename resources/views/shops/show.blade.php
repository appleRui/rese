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

  .datepicker-days th.dow:first-child,
  .datepicker-days td:first-child {
    color: #f00;
  }

  .datepicker-days th.dow:last-child,
  .datepicker-days td:last-child {
    color: #00f;
  }
</style>

<div class="shop-inner">
  <div class="shop-inneer__img"></div>
  <h2 class="mt-2 mb-2">{{ $shop->name }}</h2>
  <p>{{ $shop->description }}</p>
  <form class="card p-4" method="POST" action="{{ route('reserve.new', ['id' => $shop->id]) }}">
    @csrf
    <h3>予約</h3>
    <div>
      <label for="datetime-local">日付</label>
      <input type="datetime-local" name="start_at" class="form-control" id="datetimeLocal" id="formCalrender" value="date">
    </div>
    <div class="mt-3">
      <label for="select">予約人数</label>
      <select class="form-control" id="select" name="num_of_users">
        @foreach (range(1, 20) as $i)
        <option value="{{ $i }}">{{ $i }}名</option>
        @endforeach
      </select>
    </div>
    <input type="submit" class="mt-3 btn btn-primary" value="予約する"></input>
  </form>
</div>

@endsection