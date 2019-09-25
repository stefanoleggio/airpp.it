<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" type="text/css" rel="stylesheet">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <script src="{{ asset('jquery/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
</head>
<body>
<body>

  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading list-group-item list-group-item-action active">{{ config('app.name', 'Laravel') }}</div>
      <div class="list-group list-group-flush">
      <a href="/admin" class="list-group-item list-group-item-action bg-light">Dashboard</a>
      @if (Auth::user()->role == "master")
        <a href="/admin/users" class="list-group-item list-group-item-action bg-light">Utenti</a>
      @endif
        <a href="/admin/donazioni" class="list-group-item list-group-item-action bg-light">Donazioni</a>
        <a href="/admin/iscrizioni" class="list-group-item list-group-item-action bg-light">Iscrizioni</a>
        <a href="/admin/galleria" class="list-group-item list-group-item-action bg-light">Galleria</a>
        <a href="#drop__nw" aria-expanded="false" role="button" data-toggle="collapse" class="list-group-item list-group-item-action bg-light dropdown">Notizie</a>
        <div id="drop__nw" class="collapse">
          <a href="/admin/premi" class="list-group-item list-group-item-action bg-secondary text-white">Premi</a>
          <a href="/admin/iniziative" class="list-group-item list-group-item-action bg-secondary text-white">Iniziative</a>
          <a href="/admin/convegni" class="list-group-item list-group-item-action bg-secondary text-white">Convegni</a>
        </div>
        <a href="#drop__pg" aria-expanded="false" role="button" data-toggle="collapse" class="list-group-item list-group-item-action bg-light dropdown">Pagine</a>
        <div id="drop__pg" class="collapse">
          <a href="/admin/pg_home" class="list-group-item list-group-item-action bg-secondary text-white">Home</a>
          <a href="/admin/pg_donazioni" class="list-group-item list-group-item-action bg-secondary text-white">Donazioni</a>
          <a href="/admin/pg_associarsi" class="list-group-item list-group-item-action bg-secondary text-white">Associarsi</a>
          <a href="/admin/pg_notizie" class="list-group-item list-group-item-action bg-secondary text-white">Notizie</a>
          <a href="/admin/pg_galleria" class="list-group-item list-group-item-action bg-secondary text-white">Galleria</a>
          <a href="/admin/pg_contatti" class="list-group-item list-group-item-action bg-secondary text-white">Contatti</a>
          <a href="/admin/pg_statuto" class="list-group-item list-group-item-action bg-secondary text-white">Statuto</a>
          <a href="/admin/pg_segnalazioni" class="list-group-item list-group-item-action bg-secondary text-white">Segnalazioni</a>
          <a href="/admin/pg_cookies" class="list-group-item list-group-item-action bg-secondary text-white">Cookies</a>
        </div>
        <a href="/admin/team" class="list-group-item list-group-item-action bg-light">Team</a>
        <a href="/admin/email" class="list-group-item list-group-item-action bg-light">Email</a>
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
              <a class="nav-link" target="_blank" href="/">airpp.it <span class="sr-only">(current)</span></a>
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
