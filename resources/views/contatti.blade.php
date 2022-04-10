@extends('templates.page')
@section('content')
    @include('includes.sessionmsg')
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
    <div class="u-padding-normal">
        <div class="select-box u-margin-top-medium">
            <div class="select-box__current" tabindex="1">
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked" onchange="contactView()"/>
                    <p class="select-box__input-text">Segreteria</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="1" value="2" name="Ben" onchange="contactView()"/>
                    <p class="select-box__input-text">Segreteria scientifica</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2" value="3" name="Ben" onchange="contactView()"/>
                    <p class="select-box__input-text">Sede legale</p>
                </div>

                <img class="select-box__icon" src="{{ asset('/media/svg/select_arrow.svg') }}" alt="Arrow Icon" aria-hidden="true"/>
            </div>
            <ul class="select-box__list">
                <li>
                    <label class="select-box__option" for="0" aria-hidden="aria-hidden">Segreteria</label>
                </li>
                <!--
                <li>
                    <label class="select-box__option" for="1" aria-hidden="aria-hidden">Segreteria scientifica</label>
                </li>
                <li>
                    <label class="select-box__option" for="2" aria-hidden="aria-hidden">Sede legale</label>
                </li>
                -->
            </ul>
        </div>
    </div>
    <div id="contacts-segreteria">
        <div class="row u-margin-top-huge u-margin-bottom-big u-padding-normal u-center-text">
        @foreach($segreteria as $row)
            <div class="col-1-of-2">
                <div class="heading-secondary">
                    Email <i class="fas fa-envelope"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->email}}
                </div>
            </div>
            <div class="col-1-of-2">
                <div class="heading-secondary">
                    Indirizzo <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->sede}}
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div id="contacts-segreteria-scientifica">
        <div class="row u-margin-top-huge u-margin-bottom-big u-padding-normal u-center-text">
        @foreach($segreteria_scientifica as $row)
            <div class="col-1-of-3">
                <div class="heading-secondary">
                    Email <i class="fas fa-envelope"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->email}}
                </div>
            </div>
            <div class="col-1-of-3">
                <div class="heading-secondary">
                    Telefono <i class="fas fa-phone"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->telefono}}
                </div>
            </div>
            <div class="col-1-of-3">
                <div class="heading-secondary">
                    Indirizzo <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->sede}}
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div id="contacts-sede-legale">
        <div class="row u-margin-top-huge u-margin-bottom-big u-padding-normal u-center-text">
        @foreach($sede_legale as $row)
            <div class="col-1-of-3">
                <div class="heading-secondary">
                    Email <i class="fas fa-envelope"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->email}}
                </div>
            </div>
            <div class="col-1-of-3">
                <div class="heading-secondary">
                    Telefono <i class="fas fa-phone"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->telefono}}
                </div>
            </div>
            <div class="col-1-of-3">
                <div class="heading-secondary">
                    Indirizzo <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="u-color-black normal">
                    {{$row->sede}}
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <iframe alt="caricamento" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11203.974361699893!2d11.87137680281973!3d45.40946882598799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda459370d589%3A0x954d48fd3847a813!2sCorso+Milano%2C+43%2C+35139+Padova+PD!5e0!3m2!1sit!2sit!4v1562608642895!5m2!1sit!2sit" width="100%" height="500rem" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="u-container-fullwidth heading-secondary u-center-text u-margin-top-big u-margin-bottom-medium u-color-black">
        I nostri social
    </div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v6.0&appId=2347508062196957&autoLogAppEvents=1"></script>
    <div class="row u-padding-normal u-center-text">
        <div class="col-1-of-2">
            <div class="fb-page" data-href="{{env('FACEBOOK_URL')}}" data-width="380" data-hide-cover="false" data-show-facepile="false"></div>
        </div>
        <div class="col-1-of-2">
            <div class="heading-secondary">
                <a href="{{env('INSTAGRAM_URL')}}" id="instagram-link" class="btn__link" target="blank" ><i class="fab fa-instagram" style="font-size: 10rem;"></i></a>
            </div>
        </div>
    </div>
    <section class="textus u-bgcolor-color-grey u-padding-bottom-medium u-padding-normal">
    <div id="textus" class="u-container-fullwidth heading-secondary u-center-text u-margin-top-big u-margin-bottom-medium u-color-black">
        Domande? Scrivici!
    </div>
    <div class="u-center-text">
    @include('includes.textusform')
    </div>
    </section>
    @include('includes.privacymodal')
    <div id="textus" class="u-container-fullwidth heading-secondary u-center-text u-margin-top-big u-margin-bottom-medium u-color-black">
        Link utili
    </div>
    <div class="row u-margin-top-huge u-margin-bottom-big u-padding-normal u-center-text">
        <div class="col-1-of-4">
            <a href="https://www.dctv.unipd.it/">
                <img src="{{asset('/media/links_icons/primo.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari
                </div>
            </a>
        </div>
        <div class="col-1-of-4">
            <a href="http://www.aopd.veneto.it/">
                <img src="{{asset('/media/links_icons/secondo.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    Azienda Ospedaliera Università di Padova
                </div>
            </a>
        </div>
        <div class="col-1-of-4">
            <a href="https://www.aido.it/">
                <img src="{{asset('/media/links_icons/terzo.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    Associazione Italiana per la donazione di organi
                </div>
            </a>
        </div>
        <div class="col-1-of-4">
            <a href="http://www.trapianti.salute.gov.it/trapianti/homeCnt.jsp">
                <img src="{{asset('/media/links_icons/quarto.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    Centro Nazionale Trapianti
                </div>
            </a>
        </div>
    </div>
    <div class="row u-margin-top-huge u-margin-bottom-big u-padding-normal u-center-text">
        <div class="col-1-of-4">
            <a href="http://www.iss.it/">
                <img src="{{asset('/media/links_icons/quinto.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    Istituto Superiore di Sanità
                </div>
            </a>
        </div>
        <div class="col-1-of-4">
            <a href="https://www.osservatoriomalattierare.it/">
                <img src="{{asset('/media/links_icons/sesto.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    La prima testata giornalistica interamente dedicata alle malattie rare
                </div>
            </a>
        </div>
        <div class="col-1-of-4">
            <a href="https://oltrelamalattia.it/">
                <img src="{{asset('/media/links_icons/settimo.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    Unione Trapiantati Polmone di Padova
                </div>
            </a>
        </div>
        <div class="col-1-of-4">
            <a href="https://it.wikipedia.org/wiki/Fibrosi_polmonare_idiopatica">
                <img src="{{asset('/media/links_icons/ottavo.JPG')}}" class="img_links" alt="" srcset="">
                <div class="small u-padding-top-small">
                    Fibrosi polmonare idiopatica
                </div>
            </a>
        </div>
    </div>
    <script>
        window.onload = function() {
            contactView();
        }
        function contactView() {
            var s = document.getElementById('contacts-segreteria');
            var ss = document.getElementById('contacts-segreteria-scientifica');
            var sl = document.getElementById('contacts-sede-legale');
            s.style.display = "none";
            ss.style.display = "none";
            sl.style.display = "none";
            var contacts = [s, ss, sl];
            for (i = 0; i < 3; i++) {
                if (document.getElementById(i.toString()).checked) {
                    contacts[i].style.display = "block";
                }
            }
        }
    </script>
@endsection