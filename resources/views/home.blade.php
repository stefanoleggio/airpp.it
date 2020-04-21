@extends('templates.page')
@section('content')
<section class="presentation" id="presentation" style="background: linear-gradient(rgba(20,20,20, .6), rgba(20,20,20, .6)),url({{$data[0]->link}}); background-size: cover; background-position: center; background-attachment: fixed;">
    <header id="home_topbar">
        <div class="topbar__inner">
            <div class="logo-container">
                <a href="/">
                    <img src="{{ asset('/media/logo/logo_white.svg') }}" alt="" class="topbar__logo">
                </a>
            </div>
                <nav class="user-nav user-nav-home">
                    <ul class="user-nav__links">
                        <li class="user-nav__item">
                            <a href="/" class="user-nav__link-home">Home</a>
                        </li>
                        <li class="user-nav__item user-nav__item-drop-home">
                            <a href="#!" class="user-nav__link-home user-nav__link-main">Associazione<i class="fas fa-chevron-down"></i></a>
                            <ul class="user-nav__drop-home">
                                <li><a href="/donazioni" class="user-nav__link-home">Donazioni</a></li>
                                <li><a href="/associarsi" class="user-nav__link-home">Associarsi</a></li>
                                <li><a href="/organisociali" class="user-nav__link-home">Organi sociali</a></li>
                                <li><a href="/statuto" class="user-nav__link-home">Statuto</a></li>
                                <li><a href="/bilanci" class="user-nav__link-home">Bilanci</a></li>
                            </ul>
                        </li>
                        <li class="user-nav__item user-nav__item-drop-home">
                            <a href="#!" class="user-nav__link-home user-nav__link-main">Attivit&agrave;<i class="fas fa-chevron-down"></i></a>
                            <ul class="user-nav__drop-home">
                                <li><a href="/convegni" class="user-nav__link-home">Convegni</a></li>
                                <li><a href="/premi" class="user-nav__link-home">Premi</a></li>
                                <li><a href="/iniziative" class="user-nav__link-home">Iniziative</a></li>
                            </ul>
                        </li>
                        <li class="user-nav__item user-nav__item-drop-home">
                            <a href="#!" class="user-nav__link-home user-nav__link-main">Ricerca<i class="fas fa-chevron-down"></i></a>
                            <ul class="user-nav__drop-home">
                                <li><a href="/biobanca" class="user-nav__link-home">Biobanca</a></li>
                                <li><a href="/parlanodinoi" class="user-nav__link-home">Parlano di noi</a></li>
                                <li><a href="/articoli" class="user-nav__link-home">Articoli</a></li>
                            </ul>
                        </li>
                        <li class="user-nav__item">
                            <a href="/galleria" class="user-nav__link-home">Galleria</a>
                        </li>
                        <li class="user-nav__item">
                            <a href="/contatti" class="user-nav__link-home">Contatti</a>
                        </li>
                    </ul>
                </nav>
                <!-- Responsive button -->
                <a class="btn__burger-home" onclick="show_responsive_nav()">
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
                                <a href="#" id="news_btn" class="responsive-nav__link">Notizie</a>
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
                                <a href="/statuto" class="responsive-nav__link">Bilanci</a>
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
            <div class="presentation__text u-center-text">
                <div class="presentation__block">
                    <div class="presentation__p paragraph u-padding-bottom-medium">
                        <pre>{{ $views[0]->description }}</pre>
                    </div>
                    <div class="row">
                        <div class="col-1-of-2 u-center-text">
                            <a class="btn btn__medium btn__primary u-display-inline-block" href="/associarsi">Diventa socio</a>
                        </div>
                        <div class="col-1-of-2 u-center-text">
                            <a class="btn btn__medium btn__primary u-display-inline-block" href="/donazioni">Dona</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="u-anchor-bottom">
                <a class="btn__go"><i class="fas fa-chevron-down"></i></a>
            </div>
        </section>
        <script>
        $('.carousel').carousel()
            $('.btn__go').click(function (){
                $('html, body').animate({
                scrollTop: $(".info").offset().top
                }, 1000)
            });
        </script>
        <!-- News -->
        <div class="u-container-fullwidth heading-secondary u-center-text u-margin-top-big u-margin-bottom-medium u-color-black">
                In evidenza
        </div>
        <!-- COVID -->
        <div class="u-center-text u-margin-bottom-medium">
            <div class="newstab__container u-container-fullwidth u-display-inline-block">
                <div class="newstab u-margin-top-medium u-display-inline-block">
                    <div class="newstab__title heading-secondary-bis u-container-fullwidth u-left-text">
                        Emergenza Covid-19
                    </div>
                    <div class="newstab__text paragraph paragraph--smaller u-margin-top-small">
                        <pre>Abbiamo creato una pagina dedicata per l'emergenza, 
leggi gli articoli sul Covid-19 per tenerti informato!</pre>
                    </div>
                    <div class="newstab__links u-left-text">
                    <a href="/covid" class="btn__link normal u-color-secondary" target="blank">
                    pagina Covid-19</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->
        <div class="u-padding-normal-unique">
            <hr>
        </div>
        <!-- -->
        <section class="info">
            <div class="u-container-fullwidth heading-secondary u-center-text u-margin-top-big u-margin-bottom-medium u-color-black">
                Che cosa facciamo?
            </div>
            <?php
                $c = 0
            ?>
            @foreach($banners as $banner)
                <?php
                    if($c == 1){
                ?>
                        <div class="u-bgcolor-color-grey">
                            @include('includes.banner', 
                            [
                                'title' => $banner->title,
                                'description' => $banner->description,
                                'img' => $banner->img
                            ])
                        </div>
                <?php
                    }else{
                ?>
                        @include('includes.banner', 
                        [
                            'title' => $banner->title,
                            'description' => $banner->description,
                            'img' => $banner->img
                        ])
                <?php
                    }
                    $c++;
                ?>

            @endforeach
        </section>
@endsection