@extends('templates.page')
@section('content')
@include('includes.loader')
<section class="presentation" id="presentation" style="background: linear-gradient(rgba(20,20,20, .6), rgba(20,20,20, .6)),url({{$data[0]->link}}); ">
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
                                <li><a href="/progetti-di-ricerca" class="user-nav__link-home">Progetti di ricerca</a></li>
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
    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide">
                <div class="presentation__p paragraph u-padding-bottom-medium">
                        <pre>{{ $views[0]->description }}</pre>
                    </div>
                    <div class="row">
                        <div class="col-1-of-2 u-center-text">
                            <a class="btn btn__medium btn__home u-display-inline-block" href="/associarsi">Associarsi</a>
                        </div>
                        <div class="col-1-of-2 u-center-text">
                            <a class="btn btn__medium btn__home u-display-inline-block" href="/donazioni">Dona</a>
                        </div>
                    </div>
                </li>
                <li class="glide__slide">
                    <div class="slide">
                        <a href="/covid" target="_blank">
                            <img src="{{ asset('/media/tmp/covid-cop.jpg') }}" alt="" class="slide__img">
                        </a>
                    </div>
                </li>
            </ul>
    <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-chevron-left"></i></button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-chevron-right"></i></button>
    </div>
    <div class="glide__bullets u-padding-top-medium" data-glide-el="controls[nav]">
        <button class="glide__bullet" data-glide-dir="=0"></button>
        <button class="glide__bullet" data-glide-dir="=1"></button>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>

    const config = {
        type: 'carousel',
        autoplay: 10000,
        hoverpause: true,
    }   
        
    new Glide('.glide', config).mount()
</script>
<style>



</style>

        </section>
        <script>
            $('.btn__go').click(function (){
                $('html, body').animate({
                scrollTop: $(".info").offset().top
                }, 1000)
            });
        </script>
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