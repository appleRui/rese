@extends('layouts.layout')

@section('content')
<style>
</style>

<div class="confirm-inner">
  <div class="confirm-inneer__img"></div>
  <h2 class="mt-2 mb-2"></h2>
  <form class="card p-4" method="post" action="{{ route('reserve.store') }}">
    @csrf
    <h3>予約確認</h3>
    <div class="mt-2 mb-2">
      <strong>名前</strong>
      <p class="mt-2">{{ $name }}</p>
    </div>
    <div class="mt-2">
      <strong>メールアドレス</strong>
      <p class="mt-2">{{ $email }}</p>
    </div>
    <div class="mt-2">
      <strong>店舗名</strong>
      <p class="mt-2">{{ $shop_name }}</p>
    </div>
    <div class="mt-2">
      <strong>予約日時</strong>
      <p class="mt-2">{{ $reserveData['start_at'] }}</p>
    </div>
    <div class="mt-2 mb-2">
      <strong>人数</strong>
      <p class="mt-2">{{ $reserveData['num_of_users'] }}</p>
    </div>
    <input name="back" class="btn btn-primary" type="submit" value="戻る" />
    <input type="submit" class="mt-3 btn btn-success" value="予約" />
  </form>
</div>

@endsection