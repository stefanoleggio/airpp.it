@extends('templates.page')
@section('content')
    @foreach($banners as $banner)
            @include('includes.banner', 
            [
                'title' => $banner->title,
                'description' => $banner->description,
                'img' => $banner->img
            ])
    @endforeach
    <div class="u-padding-normal-unique">
        <hr>
    </div>
    <section class="team">
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
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="5" value="6" name="Ben" onchange="teamView()"/>
                        <p class="select-box__input-text">Collegio dei Revisori dei Conti</p>
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
                    <li>
                        <label class="select-box__option" for="5" aria-hidden="aria-hidden">Collegio dei Revisori dei Conti</label>
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
            <!-- COLLEGIO DEI REVISIORI DEI CONTI -->

            <div id="team_revisori-conti">
                <div class="row team-inner u-margin-top-huge">
                    <?php
                        $i = 0;
                    ?>
                    @foreach($users_rc as $user_rc)
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
                            'name' => $user_rc->name,
                            'surname' => $user_rc->surname,
                            'img' => $user_rc->img_path,
                            'role' => $user_rc->role,
                            'description' => $user_rc->description
                        ])
                    </div>
                    @endforeach
                </div>
            </div>

            </div>
        </section>
        <script>
        window.onload = function() {
            teamView();
        }
        function teamView() {
            var cd = document.getElementById('team_consiglio-direttivo');
            var cs = document.getElementById('team_comitato-scientifico');
            var ssea = document.getElementById('team_segreteria-scientifica-e-amministrativa');
            var cev = document.getElementById('team_comitato-eventi');
            var cet = document.getElementById('team_comitato-etico');
            var rc = document.getElementById('team_revisori-conti');
            cd.style.display = "none";
            cs.style.display = "none";
            ssea.style.display = "none";
            cev.style.display = "none";
            cet.style.display = "none";
            rc.style.display = "none";
            var team = [cd, cs, ssea, cev, cet, rc];

            for (i = 0; i < 6; i++) {
                if (document.getElementById(i.toString()).checked) {
                    team[i].style.display = "block";
                }
            }
        }
        </script>
@endsection