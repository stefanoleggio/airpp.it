@extends('templates.page')
@section('content')
        <section class="presentation">
            <div class="presentation__text u-center-text">
                <p class="heading-primary--main">Associazione italiana ricerca patologie polmonari</p>
                <div class="presentation__p paragraph">
                    L’ A.I.R.P.P. nasce a Padova grazie ad un gruppo di ricercatori, affermati a livello internazionale, impegnati da anni nello studio delle patologie polmonari, neoplastiche e non, con disfunzioni anche severe destinate a trapianto d’organo.
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
            @foreach($banners as $banner)
                @include('includes.banner', 
                [
                    'title' => $banner->title,
                    'description' => $banner->description,
                    'img' => $banner->img
                ])
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
                        <input class="select-box__input" type="radio" id="1" value="2" name="Ben" checked="checked" onchange="teamView()"/>
                        <p class="select-box__input-text">Comitato scientifico</p>
                    </div>
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="2" value="3" name="Ben" checked="checked" onchange="teamView()"/>
                        <p class="select-box__input-text">Segreteria scientifica</p>
                    </div>
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="3" value="4" name="Ben" checked="checked" onchange="teamView()"/>
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
            <div class="team u-margin-top-medium">
                <div class="col-1-of-4">
                    <div class="team__profile">
                        <div class="team__profile-photo" style="background-image: url(storage/team/fiorella_calabrese.jpg);">                       
                        </div>
                        <div class="team__profile-name">
                        </div>
                        <div class="team__profile-description">
                        </div>
                    </div>
                </div>
                <div class="col-1-of-4">
                    <div class="team__profile">
                        <div class="team__profile-photo">
                        </div>
                        <div class="team__profile-name">
                        </div>
                        <div class="team__profile-description">
                        </div>
                    </div>
                </div>
                <div class="col-1-of-4">
                    <div class="team__profile">
                        <div class="team__profile-photo">
                        </div>
                        <div class="team__profile-name">
                        </div>
                        <div class="team__profile-description">
                        </div>
                    </div>
                </div>
                <div class="col-1-of-4">
                    <div class="team__profile">
                        <div class="team__profile-photo">
                        </div>
                        <div class="team__profile-name">
                        </div>
                        <div class="team__profile-description">
                        </div>
                    </div>
                </div>
                <!--
                <div id="team__cd">

                </div>
                <div id="team__cs">

                </div>
                <div id="team__ss">

                </div>
                <div id="team__sa">
                </div>
                -->
            </div>
        </section>
@endsection