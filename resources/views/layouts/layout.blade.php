<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <header class="p-2 mb-2 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto h1 text-decoration-none">Rese</a>
        <div class="dropdown">
          @if(!is_null(auth()->user()))
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}様
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            <li><a class="dropdown-item" href="{{ route('shop.index') }}">店舗一覧</a></li>
            <li>
            <li><a class="dropdown-item" href="{{ route('favorites') }}">お気に入り一覧</a></li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <form method="POST" action="http://localhost:8000/logout">
                @csrf
                <a class="dropdown-item" href="http://localhost:8000/logout" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a>
              </form>
            </li>
          </ul>
          @else
          <a href="{{ route('login') }}" class="nav-link px-2 link-secondary">ログイン</a>
          @endif
        </div>
        <!-- <ul class="nav nav-pills">
          <li class="nav-item">
            @if(auth()->user())
            <span>{{ auth()->user()->name }}様</span>
            @endif
          </li>
          <li class="nav-item">
            @if(!is_null(auth()->user()))
            <form method="POST" action="http://localhost:8000/logout">
              @csrf
              <a class="nav-link px-2 link-secondary" href="http://localhost:8000/logout" onclick="event.preventDefault();this.closest('form').submit();">Log Out</a>
            </form>
            @else
            <a href="{{ route('login') }}" class="nav-link px-2 link-secondary">ログイン</a>
            @endif
          </li>
        </ul> -->
      </div>
    </div>
  </header>
  <div class="container">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>