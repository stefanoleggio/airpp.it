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
            <div class="heading-secondary u-color-secondary">
                Email <i class="fas fa-envelope"></i>
            </div>
            <div class="u-color-black normal">
                airpp.onlus@gmail.com 
            </div>
        </div>
        <div class="col-1-of-3">
            <div class="heading-secondary u-color-secondary">
                Telefono <i class="fas fa-phone"></i>
            </div>
            <div class="u-color-black normal">
                +39 049 8212237 
            </div>
        </div>
        <div class="col-1-of-3">
            <div class="heading-secondary u-color-secondary">
                Indirizzo <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="u-color-black normal">
                Corso Milano, 43 - 35139 PADOVA (Italy) 
            </div>
        </div>
    </div>
    <iframe alt="caricamento" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11203.974361699893!2d11.87137680281973!3d45.40946882598799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477eda459370d589%3A0x954d48fd3847a813!2sCorso+Milano%2C+43%2C+35139+Padova+PD!5e0!3m2!1sit!2sit!4v1562608642895!5m2!1sit!2sit" width="100%" height="500rem" frameborder="0" style="border:0" allowfullscreen></iframe>
    <section class="textus u-bgcolor-color-grey">
    <div class="u-container-fullwidth heading-secondary u-center-text u-margin-top-big u-margin-bottom-medium u-color-black">
        Domande? Scrivici!
    </div>
    <div class="u-center-text">
    @include('includes.textusform')
    </div>
    </section>
    @include('includes.privacymodal')
@endsection