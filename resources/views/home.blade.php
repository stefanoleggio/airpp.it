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
                        <p class="select-box__input-text">Segreteria scientifica e amministativa</p>
                    </div>
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="3" value="4" name="Ben" onchange="teamView()"/>
                        <p class="select-box__input-text">Comitato eventi</p>
                    </div>
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="4" value="5" name="Ben" onchange="teamView()"/>
                        <p class="select-box__input-text">Comitato etico</p>
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
                        <label class="select-box__option" for="2" aria-hidden="aria-hidden">Segreteria scientifica e amministrativa</label>
                    </li>
                    <li>
                        <label class="select-box__option" for="3" aria-hidden="aria-hidden">Comitato eventi</label>
                    </li>
                    <li>
                        <label class="select-box__option" for="4" aria-hidden="aria-hidden">Comitato etico</label>
                    </li>
                </ul>
            </div>
            <!-- CONSIGLIO DIRETTIVO -->
            <div id="team_consiglio-direttivo">
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
            <!-- COMITATO SCIENTIFICO -->
            <div id="team_comitato-scientifico">
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
            <!-- SEGRETERIA SCIENTIFICA E AMMINISTRATIVA -->
            <div id="team_segreteria-scientifica-e-amministrativa">
                <div class="row team-inner u-margin-top-huge">
                    <?php
                        $i = 0;
                    ?>
                    @foreach($users_ssea as $user_ssea)
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
                            'name' => $user_ssea->name,
                            'surname' => $user_ssea->surname,
                            'img' => $user_ssea->img_path,
                            'role' => $user_ssea->role,
                            'description' => $user_ssea->description
                        ])
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- COMITATO EVENTI -->
            <div id="team_comitato-eventi">
                <div class="row team-inner u-margin-top-huge">
                    <?php
                        $i = 0;
                    ?>
                    @foreach($users_cev as $user_cev)
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
                            'name' => $user_cev->name,
                            'surname' => $user_cev->surname,
                            'img' => $user_cev->img_path,
                            'role' => $user_cev->role,
                            'description' => $user_cev->description
                        ])
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- COMITATO ETICO -->
            <div id="team_comitato-etico">
                <div class="row team-inner u-margin-top-huge">
                    <?php
                        $i = 0;
                    ?>
                    @foreach($users_cet as $user_cet)
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
                            'name' => $user_cet->name,
                            'surname' => $user_cet->surname,
                            'img' => $user_cet->img_path,
                            'role' => $user_cet->role,
                            'description' => $user_cet->description
                        ])
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </section>
        <script>
        function teamView() {
            var cd = document.getElementById('team_consiglio-direttivo');
            var cs = document.getElementById('team_comitato-scientifico');
            var ssea = document.getElementById('team_segreteria-scientifica-e-amministrativa');
            var cev = document.getElementById('team_comitato-eventi');
            var cet = document.getElementById('team_comitato-etico');
            cd.style.display = "none";
            cs.style.display = "none";
            ssea.style.display = "none";
            cev.style.display = "none";
            cet.style.display = "none";
            var team = [cd, cs, ssea, cev, cet];

            for (i = 0; i < 5; i++) {
                if (document.getElementById(i.toString()).checked) {
                team[i].style.display = "block";
                }
            }
        }
            </script>
@endsection