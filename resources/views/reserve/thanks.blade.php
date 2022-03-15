@extends('layouts.layout')

@section('content')
<style>
  .card-body {
    padding: 3 rem 6 rem;
  }

  .thanks-inner {
    height: 90vh;
  }
</style>

<div class="d-flex justify-content-center align-items-center thanks-inner">
  <div class="card text-center" style="width: 18rem;">
    <div class="card-body">
      <h2 class="card-title">Thanks</h2>
      <p class="card-text">予約ID：{{ $id }}</p>
      <a href="{{ route('reserve.index') }}" class="btn btn-primary">予約一覧に戻る</a>
    </div>
  </div>
</div>

@endsection