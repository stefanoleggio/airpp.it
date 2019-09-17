@extends('templates.page')
@section('content')
        <section class="presentation">
            <div class="presentation__text u-center-text">
                <p class="heading-primary--main">{{ $views[0]->title }}</p>
                <div class="presentation__p paragraph">
                    {{ $views[0]->description }}
                    <a class="btn btn__blue u-margin-top-medium" href="#">diventa socio</a>
                </div>
            </div>
            <div class="u-anchor-bottom">
                <a class="btn__go btn__pink" href="#"><i class="fas fa-chevron-down"></i></a>
            </div>
        </section>
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
            <!--<div class="row info__tab info__grey">-->
        <div class="u-padding-normal-unique">
            <hr>
        </div>
        <section class="team">
            <div class="u-container-fullwidth heading-secondary u-center-text u-margin-top-big u-margin-bottom-medium u-color-black">
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
                        'img' => $user_cd->img,
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
                        'img' => $user_cs->img,
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
                        'img' => $user_sa->img,
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
                        'img' => $user_ss->img,
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