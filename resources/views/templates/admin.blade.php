<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<body>

  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading list-group-item list-group-item-action active">{{ config('app.name', 'Laravel') }}</div>
      <div class="list-group list-group-flush">
      <a href="/admin" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="/admin/donazioni" class="list-group-item list-group-item-action bg-light">Donazioni</a>
        <a href="/admin/iscrizioni" class="list-group-item list-group-item-action bg-light">Iscrizioni</a>
        <a href="/admin/convegni" class="list-group-item list-group-item-action bg-light">Galleria</a>
        <a href="/admin/premi" class="list-group-item list-group-item-action bg-light">Premi</a>
        <a href="/admin/iniziative" class="list-group-item list-group-item-action bg-light">Iniziative</a>
        <a href="/admin/convegni" class="list-group-item list-group-item-action bg-light">Convegni</a>
        <a href="/admin/pagine" class="list-group-item list-group-item-action bg-light dropdown">Pagine</a>
        <a href="/admin/componenti" class="list-group-item list-group-item-action bg-light dropdown">Componenti</a>
      </div>
    </div>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">airpp.it <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container">
        @yield('content')
    </div>

  </div>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
