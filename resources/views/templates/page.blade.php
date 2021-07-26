<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
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