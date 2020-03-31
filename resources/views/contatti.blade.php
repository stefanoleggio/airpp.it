@extends('templates.page', ['title' => 'Contatti'])
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
    <div class="row u-margin-top-huge u-margin-bottom-big u-padding-normal u-center-text">
        <div class="col-1-of-3">
            <div class="heading-secondary">
                Email <i class="fas fa-envelope"></i>
            </div>
            <div class="u-color-black normal">
                {{$email[0]->description}}
            </div>
        </div>
        <div class="col-1-of-3">
            <div class="heading-secondary">
                Telefono <i class="fas fa-phone"></i>
            </div>
            <div class="u-color-black normal">
                {{$telefono[0]->description}}
            </div>
        </div>
        <div class="col-1-of-3">
            <div class="heading-secondary">
                Indirizzo <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="u-color-black normal">
                {{$sede[0]->description}}
            </div>
        </div>
    </div>
    <!--
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
                <p class="select-box__input-text">Sede legale</p>
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
                <label class="select-box__option" for="5" aria-hidden="aria-hidden">Sede legale</label>
            </li>
        </ul>
    </div>
    <div class="contacts_tab normal" id="contacts_consiglio-direttivo">
        @foreach($contacts_cd as $contact_cd)
        <div class="row">
            <div class="col-1-of-2">
                {{ $contact_cd->title }}  
            </div>
            <div class="col-1-of-2">
                {{ $contact_cd->description }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="contacts_tab normal" id="contacts_comitato-scientifico">
        @foreach($contacts_cs as $contact_cs)
        <div class="row">
            <div class="col-1-of-2">
                {{ $contact_cs->title }}  
            </div>
            <div class="col-1-of-2">
                {{ $contact_cs->description }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="contacts_tab normal" id="contacts_segreteria-scientifica-e-amministrativa">
        @foreach($contacts_ssea as $contact_ssea)
        <div class="row">
            <div class="col-1-of-2">
                {{ $contact_ssea->title }}  
            </div>
            <div class="col-1-of-2">
                {{ $contact_ssea->description }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="contacts_tab normal" id="contacts_comitato-eventi">
        @foreach($contacts_cev as $contact_cev)
        <div class="row">
            <div class="col-1-of-2">
                {{ $contact_cev->title }}  
            </div>
            <div class="col-1-of-2">
                {{ $contact_cev->description }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="contacts_tab normal" id="contacts_comitato-etico">
        @foreach($contacts_cet as $contact_cet)
        <div class="row">
            <div class="col-1-of-2">
                {{ $contact_cet->title }}  
            </div>
            <div class="col-1-of-2">
                {{ $contact_cet->description }}
            </div>
        </div>
        @endforeach
    </div>
    <div class="contacts_tab normal" id="contacts_sede-legale">
        @foreach($contacts_sl as $contact_sl)
        <div class="row">
            <div class="col-1-of-2">
                {{ $contact_sl->title }}  
            </div>
            <div class="col-1-of-2">
                {{ $contact_sl->description }}
            </div>
        </div>
        @endforeach
    </div>
    -->
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
    <section class="textus u-bgcolor-color-grey">
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
        function teamView() {
            var cd = document.getElementById('contacts_consiglio-direttivo');
            var cs = document.getElementById('contacts_comitato-scientifico');
            var ssea = document.getElementById('contacts_segreteria-scientifica-e-amministrativa');
            var cev = document.getElementById('contacts_comitato-eventi');
            var cet = document.getElementById('contacts_comitato-etico');
            var sl = document.getElementById('contacts_sede-legale');
            cd.style.display = "none";
            cs.style.display = "none";
            ssea.style.display = "none";
            cev.style.display = "none";
            cet.style.display = "none";
            sl.style.display = "none";
            var contacts = [cd, cs, ssea, cev, cet, sl];

            for (i = 0; i < 6; i++) {
                if (document.getElementById(i.toString()).checked) {
                    contacts[i].style.display = "block";
                }
            }
        }
    </script>
@endsection