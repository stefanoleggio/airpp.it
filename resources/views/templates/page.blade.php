<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        @include('cookieConsent::index')
        @include('includes.topbar')
        @if (Request::path() != '/')
            <div class="topbar-offset">
            </div>
            @yield('content')
        @endif
        @if(Request::path() == '/')
            <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->

                <!-- Demo content -->			
                <div id="demo-content">
                    <header class="entry-header">
                    </header>
                    <div id="loader-wrapper">
                        <div id="loader"></div>
                        <div class="loader-section section-left"></div>
                        <div class="loader-section section-right"></div>

                    </div>
                    <div id="content">
                        @yield('content')
                    </div>
                </div>
        @endif
        @include('includes.footer')
    </body>
</html>