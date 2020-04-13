
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/media/logo/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/media/logo/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/media/logo/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/site.webmanifest')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<style>
.logo_container{
    text-align: center;
    padding: 2rem;
}
.logo_container img{
    display: inline-block;
    width: 15rem;
}
</style>
<div class="logo_container">
    <a href="/" target="blank">
        <img src="{{ asset('/media/logo/logo.svg') }}">
    </a>
</div>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Attenzione!</strong> Le credenziali inserite non sono corrette.
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pannello amministrativo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="password" class="form-control" name="code" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group" style="text-align: center;">
                            <div class="g-recaptcha" style="display: inline-block; padding: 2rem;" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>