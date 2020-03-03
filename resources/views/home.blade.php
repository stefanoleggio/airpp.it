@extends('templates.page')
@section('content')
<!--

    Loader

<div class="loader-wrapper">
        <div class="loader-part"></div>
        <img src="/media/logo/logo_white.svg" class="loader" alt="">
        <div class="loader-part"></div>
</div>
<style>
.loader-wrapper {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: #242f3f;
  display:flex;
  justify-content: center;
  align-items: center;
  z-index: 101;
}
.loader-part{
    width:50%;
    height: 100%;
}
.loader {
  display: inline-block;
  width: 300px;
  height: 300px;
  position: relative;
    -webkit-animation: bounce-in-top 1.1s both;
	animation: bounce-in-top 1.1s both;
}
@-webkit-keyframes bounce-in-top {
  0% {
    -webkit-transform: translateY(-500px);
            transform: translateY(-500px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
    opacity: 0;
  }
  38% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
    opacity: 1;
  }
  55% {
    -webkit-transform: translateY(-65px);
            transform: translateY(-65px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  72% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  81% {
    -webkit-transform: translateY(-28px);
            transform: translateY(-28px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  90% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  95% {
    -webkit-transform: translateY(-8px);
            transform: translateY(-8px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  100% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
@keyframes bounce-in-top {
  0% {
    -webkit-transform: translateY(-500px);
            transform: translateY(-500px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
    opacity: 0;
  }
  38% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
    opacity: 1;
  }
  55% {
    -webkit-transform: translateY(-65px);
            transform: translateY(-65px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  72% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  81% {
    -webkit-transform: translateY(-28px);
            transform: translateY(-28px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  90% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  95% {
    -webkit-transform: translateY(-8px);
            transform: translateY(-8px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  100% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
</style>
<script>
    $(window).on("load",function(){
        setTimeout(function(){ 
            $(".loader-wrapper").hide();
        }, 100);
    });
</script>
-->
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
                            <a href="#!" class="user-nav__link-home user-nav__link-main">Attivit&agrave;<i class="fas fa-chevron-down"></i></a>
                            <ul class="user-nav__drop-home">
                                <li><a href="/convegni" class="user-nav__link-home">Convegni</a></li>
                                <li><a href="/premi" class="user-nav__link-home">Premi</a></li>
                                <li><a href="/iniziative" class="user-nav__link-home">Iniziative</a></li>
                            </ul>
                        </li>
                        <li class="user-nav__item user-nav__item-drop-home">
                            <a href="#!" class="user-nav__link-home user-nav__link-main">Associazione<i class="fas fa-chevron-down"></i></a>
                            <ul class="user-nav__drop-home">
                                <li><a href="/donazioni" class="user-nav__link-home">Donazioni</a></li>
                                <li><a href="/associarsi" class="user-nav__link-home">Associarsi</a></li>
                                <li><a href="/statuto" class="user-nav__link-home">Statuto</a></li>
                                <li><a href="/bilanci" class="user-nav__link-home">Bilanci</a></li>
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
                        {{ $views[0]->description }}
                    </div>
                    <div class="row">
                        <div class="col-1-of-2 u-center-text">
                            <a class="btn btn__medium btn__primary u-display-inline-block" href="/associarsi">diventa socio</a>
                        </div>
                        <div class="col-1-of-2 u-center-text">
                            <a class="btn btn__medium btn__primary u-display-inline-block" href="/donazioni">dona ora</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="u-anchor-bottom">
                <a class="btn__go"><i class="fas fa-chevron-down"></i></a>
            </div>
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
        <div class="u-padding-normal-unique">
            <hr>
        </div>
        <section class="team">
            <div class="u-container-fullwidth heading-secondary u-center-text u-margin-top-small u-margin-bottom-medium u-color-black">
                Chi siamo?
            </div>
            <div class="select-box u-margin-top-medium">
                <div class="select-box__current" tabindex="1">
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked" onchange="teamView()"/>
                        <p class="select-box__input-text">Consiglio direttivo</p>
                    </div>
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="1" value="2" name="Ben" onchange="teamView()"/>
                        <p class="select-box__input-text">Comitato scientifico</p>
                    </div>
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="2" value="3" name="Ben" onchange="teamView()"/>
                        <p class="select-box__input-text">Segreteria scientifica</p>
                    </div>
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="3" value="4" name="Ben" onchange="teamView()"/>
                        <p class="select-box__input-text">Segreteria amministrativa</p>
                    </div>
                    <img class="select-box__icon" src="{{ asset('/media/svg/select_arrow.svg') }}" alt="Arrow Icon" aria-hidden="true"/>
                </div>
                <ul class="select-box__list">
                    <li>
                        <label class="select-box__option" for="0" aria-hidden="aria-hidden">Consiglio direttivo</label>
                    </li>
                    <li>
                        <label class="select-box__option" for="1" aria-hidden="aria-hidden">Comitato scientifico</label>
                    </li>
                    <li>
                        <label class="select-box__option" for="2" aria-hidden="aria-hidden">Segreteria scientifica</label>
                    </li>
                    <li>
                        <label class="select-box__option" for="3" aria-hidden="aria-hidden">Segreteria amministrativa</label>
                    </li>
                </ul>
            </div>
            <div id="team_cd">
            <div class="row team-inner u-margin-top-huge">
                <?php
                    $i = 0;
                ?>
                @foreach($users_cd as $user_cd)
                <?php
                $i++;
                if($i == 4)
                {
                    $i = 1;
                    echo '</div> <div class="row">';
                }
                ?>
                <div class="col-1-of-3 team-inner u-margin-bottom-small u-center-text">
                    @include('includes.card', 
                    [
                        'name' => $user_cd->name,
                        'surname' => $user_cd->surname,
                        'img' => $user_cd->img_path,
                        'role' => $user_cd->role,
                        'description' => $user_cd->description
                    ])
                </div>
                @endforeach
            </div>
            </div>
            <div id="team_cs">
            <div class="row team-inner u-margin-top-huge">
                <?php
                    $i = 0;
                ?>
                @foreach($users_cs as $user_cs)
                <?php
                $i++;
                if($i == 4)
                {
                    $i = 1;
                    echo '</div> <div class="row">';
                }
                ?>
                <div class="col-1-of-3 team-inner u-margin-bottom-small u-center-text">
                    @include('includes.card', 
                    [
                        'name' => $user_cs->name,
                        'surname' => $user_cs->surname,
                        'img' => $user_cs->img_path,
                        'role' => $user_cs->role,
                        'description' => $user_cs->description
                    ])
                </div>
                @endforeach
            </div>
            </div>
            <div id="team_sa">
            <div class="row team-inner u-margin-top-huge">
                <?php
                    $i = 0;
                ?>
                @foreach($users_sa as $user_sa)
                <?php
                $i++;
                if($i == 4)
                {
                    $i = 1;
                    echo '</div> <div class="row">';
                }
                ?>
                <div class="col-1-of-3 team-inner u-margin-bottom-small u-center-text">
                    @include('includes.card', 
                    [
                        'name' => $user_sa->name,
                        'surname' => $user_sa->surname,
                        'img' => $user_sa->img_path,
                        'role' => $user_sa->role,
                        'description' => $user_sa->description
                    ])
                </div>
                @endforeach
            </div>
            </div>
            <div id="team_ss">
            <div class="row team-inner u-margin-top-huge">
                <?php
                    $i = 0;
                ?>
                @foreach($users_ss as $user_ss)
                <?php
                $i++;
                if($i == 4)
                {
                    $i = 1;
                    echo '</div> <div class="row">';
                }
                ?>
                <div class="col-1-of-3 team-inner u-margin-bottom-small u-center-text">
                    @include('includes.card', 
                    [
                        'name' => $user_ss->name,
                        'surname' => $user_ss->surname,
                        'img' => $user_ss->img_path,
                        'role' => $user_ss->role,
                        'description' => $user_ss->description
                    ])
                </div>
                @endforeach
            </div>
            </div>
            </div>
        </section>
        <script>
        function teamView() {
            var cd = document.getElementById('team_cd');
            var cs = document.getElementById('team_cs');
            var ss = document.getElementById('team_ss');
            var sa = document.getElementById('team_sa');
            cd.style.display = "none";
            cs.style.display = "none";
            ss.style.display = "none";
            sa.style.display = "none";
            var team = [cd, cs, ss, sa];

            for (i = 0; i < 4; i++) {
                if (document.getElementById(i.toString()).checked) {
                team[i].style.display = "block";
                }
            }
        }
            </script>
@endsection