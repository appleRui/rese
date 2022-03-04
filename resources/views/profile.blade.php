@extends('layouts.layout')

@section('content')

<div class="profile-inner">
  <div class="profile-inneer__img"></div>
  <h2 class="mt-2 mb-2">Name：{{ auth()->user()->name }}</h2>
  <p>{{ auth()->user()->email }}</p>
</div>

@endsection