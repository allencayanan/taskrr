<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Taskrr</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('tasks.index') }}">Taskrr</a>
        @auth

          <form class="d-flex" action="{{ route('tasks.index') }}">
            <input class="form-control me-2" type="search" placeholder="Search" name="search" value="{{ request()->input('search') }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <form class="d-flex" method="POST" action="{{ route('login.logout') }}">
            @csrf
            <button class="btn btn-outline-danger" type="submit">Logout</button>
          </form>
        @endauth
      </div>
    </nav>
    <section class="content mt-3">
      @yield('content')
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
