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
        @endif
        @yield('content')
        @include('includes.footer')
    </body>
</html>