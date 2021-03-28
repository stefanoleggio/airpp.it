<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" integrity="sha512-wYsVD8ho6rJOAo1Xf92gguhOGQ+aWgxuyKydjyEax4bnuEmHUt6VGwgpUqN8VlB4w50d0nt+ZL+3pgaFMAmdNQ==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css" integrity="sha512-wCwx+DYp8LDIaTem/rpXubV/C1WiNRsEVqoztV0NZm8tiTvsUeSlA/Uz02VTGSiqfzAHD4RnqVoevMcRZgYEcQ==" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js" integrity="sha512-BXASbMmKLu+RC5TDnkupyhvrjiOQXILh/5zgIS8k5JAC71a73lNweVEg/X+9XJQ7GK22PH9WpztY3zqrji+xrQ==" crossorigin="anonymous"></script>
    <body>
        @include('includes.aos')
        @include('cookieConsent::index')
        @include('includes.topbar')
        @if (Request::path() != '/')
            <div class="topbar-offset">
            </div>
            @yield('content')
        @endif
        @if(Request::path() == '/')
            <!--[if IE]>
            Non-IE browsers ignore this
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->
            <div id="content">
                @yield('content')
            </div>
        @endif
        @include('includes.footer')
    </body>
</html>