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
            <div class="row team-inner u-margin-top-medium">
                <div class="col-1-of-4 u-margin-bottom-small">
                    <div class="team__profile u-center-text">
                        <div class="team__profile-photo" style="background-image: url(/media/img/team/calabrese_fiorella.jpg);">  
                        </div>
                        <div class="team__profile-name normal">
                            Fiorella Calabrese
                        </div>
                        <div class="team__profile-role small u-text-bold">
                            Presidente
                        </div>
                        <div class="team__profile-description small">
                        Professore Associato in Anatomia Patologica, presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.                        </div>
                    </div>
                </div>
                <div class="col-1-of-4 u-margin-bottom-small">
                    <div class="team__profile u-center-text">
                        <div class="team__profile-photo" style="background-image: url(/media/img/team/calabrese_fiorella.jpg);">  
                        </div>
                        <div class="team__profile-name normal">
                            Fiorella Calabrese
                        </div>
                        <div class="team__profile-role small u-text-bold">
                            Presidente
                        </div>
                        <div class="team__profile-description small">
                        Professore Associato in Anatomia Patologica, presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.                        </div>
                    </div>
                </div>
                <div class="col-1-of-4 u-margin-bottom-small">
                    <div class="team__profile u-center-text">
                        <div class="team__profile-photo" style="background-image: url(/media/img/team/calabrese_fiorella.jpg);">  
                        </div>
                        <div class="team__profile-name normal">
                            Fiorella Calabrese
                        </div>
                        <div class="team__profile-role small u-text-bold">
                            Presidente
                        </div>
                        <div class="team__profile-description small">
                        Professore Associato in Anatomia Patologica, presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.                        </div>
                    </div>
                </div>
                <div class="col-1-of-4 u-margin-bottom-small">
                    <div class="team__profile u-center-text">
                        <div class="team__profile-photo" style="background-image: url(/media/img/team/calabrese_fiorella.jpg);">  
                        </div>
                        <div class="team__profile-name normal">
                            Fiorella Calabrese
                        </div>
                        <div class="team__profile-role small u-text-bold">
                            Presidente
                        </div>
                        <div class="team__profile-description small">
                        Professore Associato in Anatomia Patologica, presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection