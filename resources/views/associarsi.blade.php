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
    <section class="u-bgcolor-color-grey u-container-fullwidth u-padding-bottom-medium">
        <div class="row u-padding-normal ">
            <div class="col-1-of-2 u-center-text">
                <div class="heading-secondary u-margin-bottom-medium u-color-black">
                {{ $datas[0]->title }}
                </div>
                <div class="paragraph">
                {{ $datas[0]->description }}
                </div>
                <div class="u-center-text u-container-fullwidth" id="msg__container">
                    <div class="msg msg__info u-display-inline-block">
                        <span onclick="document.getElementById('msg__container').style.display='none'" class="msg__close u-font-weight-bold">&times;</span>                
                        <div class="normal u-font-weight-bold">
                                <i class="fa fa-info-circle"></i>
                                Sei già socio e devi rinnovare?
                        </div>
                            <div class="msg__description small margin-top-small u-text-align-left">
                            <pre>Se devi rinnovare la tua iscrizione clicca <a href="/rinnovo" class="u-underline"> qui</a></pre>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-1-of-2 u-center-text">
                @include('includes.joinusform')
            </div>
        </div>
    </section>
    <div class="u-center-text">
        <div class="textcontainer">
            <div class="heading-secondary u-margin-bottom-medium u-color-black">
                {{ $datas[1]->title }}
            </div>
            <div class="u-center-text">
                <div class="paragraph">
                    <pre>{{ $datas[1]->description }}</pre>
                    @foreach($docs as $doc)
                    @include('includes.link',[
                            'text' => 'Scarica il modulo',
                            'link' => $doc->link
                        ])
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
    @include('includes.privacymodal')
    @include('includes.googlescripts')
@endsection