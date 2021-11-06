<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    <body>
        @include('includes.aos')
        @include('cookieConsent::index')
        @include('includes.topbar')
        <!-- IE Alert -->

            <div id="IEAlert" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Attenzione, browser non supportato</h4>
                        </div>
                        <div class="modal-body">
                        <div class="modal-pap">
                            <h2>
                            Internet Explorer non consente la visualizzazione corretta di alcuni elementi del sito web.
                            </h2>
                            Si prega di usare un browser differente come Mozilla Firefox, Google Chrome, Opera, Safari, Microsoft Edge.
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            if (window.document.documentMode) {
                setTimeout(function() {
                    $('#IEAlert').modal('show');
                }, 4000);
            }
        </script>
        <!-- -->
        @if (Request::path() != '/')
            <div class="topbar-offset">
            </div>
            @yield('content')
        @endif
        @if(Request::path() == '/')
            <div id="content">
                @yield('content')
            </div>
        @endif
        @include('includes.footer')
    </body>
</html>