@extends('layouts.layout')

@section('content')
<h2 class="mt-3 mb-3">
  予約一覧
</h2>
<ul class="list-group">
  @if($reserves->isEmpty())
  <p class="text-center">予約が存在しません</p>
  @endif

  @foreach($reserves as $reserve)
  <li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center">
      <div>
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
          <span class="d-block">予約者: <date>{{ $reserve->user->name }}</date></span>
          <span class="d-block">予約日時: <date>{{ $reserve->start_at }}</date></span>
          <span>人数: <date>{{ $reserve->num_of_users }}</date></span>
        </div>

      </div>
      <div>
        <form action="{{ route('reserve.destroy', ['id' => $reserve->id])  }}" method="post">
          @csrf
          @method('delete')
          <input type="submit" value="予約を取り消す" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
        </form>
      </div>
    </div>
  </li>
  @endforeach
</ul>
@endsection