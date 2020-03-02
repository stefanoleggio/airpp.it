<!-- Responsive sidebar -->

<script>
    function show_responsive_nav(){
        document.getElementById("sidebar").style.width = "100%";
    }
    function hide_responsive_nav(){
        document.getElementById("sidebar").style.width = "0%";
    }
</script>
<!-- / -->
<!-- Topbar -->
<header id="topbar">
    <div class="topbar__inner">
        <div class="logo-container">
            <a href="/">
                <img src="{{ asset('/media/logo/logo.svg') }}" alt="" class="topbar__logo">
            </a>
        </div>
            <nav class="user-nav">
                <ul class="user-nav__links">
                    <li class="user-nav__item">
                        <a href="/" class="user-nav__link">Home</a>
                    </li>
                    <li class="user-nav__item user-nav__item-drop">
                        <a href="#!" class="user-nav__link user-nav__link-main">Attivit&agrave;<i class="fas fa-chevron-down"></i></a>
                        <ul class="user-nav__drop">
                            <li><a href="/convegni" class="user-nav__link">Convegni</a></li>
                            <li><a href="/premi" class="user-nav__link">Premi</a></li>
                            <li><a href="/iniziative" class="user-nav__link">Iniziative</a></li>
                        </ul>
                    </li>
                    <li class="user-nav__item user-nav__item-drop">
                        <a href="#!" class="user-nav__link user-nav__link-main">Associazione<i class="fas fa-chevron-down"></i></a>
                        <ul class="user-nav__drop">
                            <li><a href="/donazioni" class="user-nav__link">Donazioni</a></li>
                            <li><a href="/associarsi" class="user-nav__link">Associarsi</a></li>
                            <li><a href="/statuto" class="user-nav__link">Statuto</a></li>
                            <li><a href="/bilanci" class="user-nav__link">Bilanci</a></li>
                        </ul>
                    </li>
                    <li class="user-nav__item user-nav__item-drop">
                            <a href="#!" class="user-nav__link user-nav__link-main">Ricerca<i class="fas fa-chevron-down"></i></a>
                            <ul class="user-nav__drop">
                                <li><a href="/biobanca" class="user-nav__link">Biobanca</a></li>
                                <li><a href="/parlanodinoi" class="user-nav__link">Parlano di noi</a></li>
                                <li><a href="/articoli" class="user-nav__link">Articoli</a></li>
                            </ul>
                        </li>
                    <li class="user-nav__item">
                        <a href="/galleria" class="user-nav__link">Galleria</a>
                    </li>
                    <li class="user-nav__item">
                        <a href="/contatti" class="user-nav__link">Contatti</a>
                    </li>
                </ul>
            </nav>
            <!-- Responsive button -->
            <a class="btn__burger" onclick="show_responsive_nav()">
                <i class="fas fa-bars"></i>
            </a>
            <!-- / -->
        </div>
        <nav class="overlay" id="sidebar">
            <a onclick="hide_responsive_nav()" class="responsive-nav__close">
                    <i class="fas fa-times"></i>    
                </a>
            <div class="overlay-content">
                <ul class=" u-center-text responsive-nav">
                    <li class="responsive-nav__item">
                        <a href="/" class="responsive-nav__link">Home</a>
                    </li>
                    <li class="responsive-nav__item">
                            <a href="#" id="news_btn" class="responsive-nav__link">Attivit&agrave;</a>
                    </li>
                    <ul id="news" style="display:none;">
                        <li class="responsive-nav__subitem">
                                <a href="/convegni" class="responsive-nav__link">Convegni</a>
                        </li>
                        <li class="responsive-nav__subitem">
                                <a href="/premi" class="responsive-nav__link">Premi</a>
                        </li>
                        <li class="responsive-nav__subitem">
                                <a href="/iniziative" class="responsive-nav__link">Iniziative</a>
                        </li>
                    </ul>
                    <li class="responsive-nav__item">
                        <a href="#" id="sostienici_btn" class="responsive-nav__link">Associazione</a>
                    </li>
                    <ul id="sostienici" style="display:none;">
                        <li class="responsive-nav__subitem">
                                <a href="/donazioni" class="responsive-nav__link">Donazioni</a>
                        </li>
                        <li class="responsive-nav__subitem">
                                <a href="/associarsi" class="responsive-nav__link">Associarsi</a>
                        </li>
                        <li class="responsive-nav__subitem">
                                <a href="/statuto" class="responsive-nav__link">Statuto</a>
                        </li>
                        <li class="responsive-nav__subitem">
                                <a href="/bilanci" class="responsive-nav__link">Bilanci</a>
                        </li>
                    </ul>
                    <li class="responsive-nav__item">
                        <a href="#" id="ricerca_btn" class="responsive-nav__link">Ricerca</a>
                    </li>
                    <ul id="ricerca" style="display:none;">
                        <li class="responsive-nav__subitem">
                                <a href="/biobanca" class="responsive-nav__link">Biobanca</a>
                        </li>
                        <li class="responsive-nav__subitem">
                                <a href="/parlanodinoi" class="responsive-nav__link">Parlano di noi</a>
                        </li>
                        <li class="responsive-nav__subitem">
                                <a href="/articoli" class="responsive-nav__link">Articoli</a>
                        </li>
                    </ul>
                    <li class="responsive-nav__item">
                        <a href="/galleria" class="responsive-nav__link">Galleria</a>
                    </li>
                    <li class="responsive-nav__item">
                        <a href="/contatti" class="responsive-nav__link">Contatti</a>
                    </li>
                </ul>
            </div>
        </nav>
</header>
<script>
    $( "#news_btn" ).click(function() {
        $( "#news" ).slideToggle();
    });
    $( "#sostienici_btn" ).click(function() {
        $( "#sostienici" ).slideToggle();
    });
    $( "#ricerca_btn" ).click(function() {
        $( "#ricerca" ).slideToggle();
    });
    @if (Request::path() == '/')
        var prevScrollpos = window.pageYOffset;
        window.onload = function() {
            teamView();
            document.getElementById("topbar").style.top = "-15rem"; 
        }
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if(currentScrollPos== 0){
            document.getElementById("topbar").style.top = "-15rem"; 
        }else{
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("topbar").style.top = "0";
            } else {
                document.getElementById("topbar").style.top = "-15rem";
            }
            prevScrollpos = currentScrollPos;
        }
        }
    @else
        var prevScrollpos = window.pageYOffset;
            window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("topbar").style.top = "0";
            } else {
                document.getElementById("topbar").style.top = "-15rem";
            }
            prevScrollpos = currentScrollPos;
            }
    @endif

</script>

<!-- / -->