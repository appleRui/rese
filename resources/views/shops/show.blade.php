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

<div class=" row shop-inner">
  <div class="col-8">
    <div class="shop-inneer__img"></div>
    <h2 class="mt-2 mb-2">{{ $shop->name }}</h2>
    <p>{{ $shop->description }}</p>
  </div>
  <div class="col-4">
    <form class="card p-4" method="POST" action="{{ route('reserve.new', ['id' => $shop->id]) }}">
      @csrf
      <h3 class="mb-3">予約</h3>
      @if ($errors->any())
      <div class="alert alert-danger mt-3">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="row">
        <div class="w-50 col-5">
          <label class="my-2" for="date">日付</label>
          <input required type="date" id="start_date" name="date" class="form-control" id="date" value="{{ old('date') }}">
        </div>
        <div class="w-50 col-5">
          <label class="my-2" for="time">時間</label>
          <input required type="time" step="900" min="09:00" max="22:00" name="time" class="form-control" id="time" value="{{ old('time') }}">
        </div>
        <div class="mt-3 col-12">
          <label class="my-2" for="select">予約人数</label>
          <select class="form-select" id="select" name="num_of_users" value="{{ old('num_of_users') }}">
            @foreach (range(1, 20) as $i)
            <option value="{{ $i }}">{{ $i }}名</option>
            @endforeach
          </select>
        </div>
      </div>
      <input type="submit" class="mt-3 btn btn-primary" value="予約する"></input>
    </form>
  </div>
</div>

<script>
  const today = new Date;
  const dateForm = document.getElementById('start_date')
  const timeForm = document.getElementById('start_time')
  today.setDate(today.getDate())
  const yyyy = today.getFullYear()
  const mm = ("0" + (today.getMonth() + 1)).slice(-2)
  const dd = ("0" + today.getDate()).slice(-2)
  dateForm.value = yyyy + '-' + mm + '-' + dd
</script>

@endsection