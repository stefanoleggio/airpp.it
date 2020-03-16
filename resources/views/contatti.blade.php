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
    <div class="u-padding-normal">
        <div class="row u-margin-none">
            <div class="col-1-of-3 normal u-font-weight-bold u-padding-small">
                    Consiglio direttivo
            </div>
        </div>
        <div class="row u-margin-none u-padding-small normal">
            <div class="col-1-of-3">
                Fiorella Calabrese
            </div>
            <div class="col-1-of-3">
                Presidente
            </div>
            <div class="col-1-of-3">
                fiorella.calabrese@unipd.it
            </div>
        </div>
        <div class="row u-margin-none u-padding-small normal">
            <div class="col-1-of-3">
                Fiorella Calabrese
            </div>
            <div class="col-1-of-3">
                Presidente
            </div>
            <div class="col-1-of-3">
                fiorella.calabrese@unipd.it
            </div>
        </div>
        <div class="row u-margin-none">
            <div class="col-1-of-3 normal u-font-weight-bold u-padding-small">
                    Comitato scientifico
            </div>
        </div>
        <div class="row u-margin-none">
            <div class="col-1-of-3 normal u-font-weight-bold u-padding-small">
                    Segreteria scientifica
            </div>
        </div>
        <div class="row u-margin-none">
            <div class="col-1-of-3 normal u-font-weight-bold u-padding-small">
                    Segreteria amministrativa
            </div>
        </div>
    </div>
    -->
    <iframe alt="caricamento" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11203.974361699893!2d11.87137680281973!3d45.40946882598799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda459370d589%3A0x954d48fd3847a813!2sCorso+Milano%2C+43%2C+35139+Padova+PD!5e0!3m2!1sit!2sit!4v1562608642895!5m2!1sit!2sit" width="100%" height="500rem" frameborder="0" style="border:0" allowfullscreen></iframe>
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
@endsection