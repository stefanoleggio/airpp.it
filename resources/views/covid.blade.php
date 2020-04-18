<html>
    <head>
        <meta name="robots" content="noindex"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Covid-19</title>
        <script src="{{ asset('jquery/jquery.min.js') }}"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/media/logo/favicon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/media/logo/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/media/logo/favicon/favicon-16x16.png')}}">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" type="text/css" rel="stylesheet">
        <script src="{{ asset('jquery/jquery.js') }}"></script>
       <script src="{{ asset('js/bootstrap.js') }}"></script>
        </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">torna su airpp.it
                <span class="sr-only">(current)</span>
              </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead" style="background: linear-gradient(rgba(20,20,20, .6), rgba(20,20,20, .6)),url(/media/tmp/covid.jpg); background-size: cover; background-position: center; background-attachment: fixed;">
  <div class="container h-100">
    <div class="row h-100 align-items-center" style="color:white">
      <div class="col-12 text-center">
      <div class="mb-5">
      <a href="/" class="mb-3">
            <img src="{{ asset('/media/logo/logo_white.svg') }}" style="width: 20rem">
        </a>
        </div>
        <h1 class="font-weight-light">Emergenza covid-19</h1>
        <p class="lead">Leggi gli articoli scientifici per tenerti aggiornato</p>
      </div>
    </div>
  </div>
</header>

<!-- Page Content -->
<section class="py-5">
  <div class="container">
  @foreach($posts as $post)
  <div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
        <a href="{{$post->link}}" class="btn btn-primary">Scarica</a>
    </div>
    </div>
    @endforeach
    <?php echo $posts->links(); ?>
  </div>
</section>
    </body>
</html>