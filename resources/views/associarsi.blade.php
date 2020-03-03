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
    <section class="u-bgcolor-color-grey u-container-fullwidth">
        <div class="row u-padding-normal ">
            <div class="col-1-of-2 u-center-text">
                <div class="heading-secondary u-margin-bottom-medium u-color-black">
                {{ $datas[0]->title }}
                </div>
                <div class="paragraph">
                {{ $datas[0]->description }}
                </div>
                @include('includes.msg', 
                [
                    'type' => 'info',
                            'txt' => "Quota annua",
                            'desc' => "Per diventare socio ordinario è richiesta una quota annua di 15€"
                ])
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