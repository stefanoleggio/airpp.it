<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        @include('includes.topbar')
        @if (Request::path() != '/')
            <div class="topbar-offset">
            </div>
        @endif
        @yield('content')
        @include('includes.footer')
    </body>
</html>