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
    <div class="u-center-text u-margin-bottom-big">
        @foreach($posts as $post)
        <div class="newstab__container u-container-fullwidth">
            <div class="newstab u-margin-top-big u-display-inline-block">
                <div class="newstab__title heading-secondary u-container-fullwidth u-left-text">
                    {{$post->title}}
                </div>
                <div class="newstab__text paragraph paragraph--smaller u-margin-top-small">
                    <pre>{{$post->description}}</pre>
                </div>
                <div class="newstab__links u-left-text">
                    <a href="{{$post->link}}" class="btn__link normal u-color-secondary" target="blank">
                        Scarica l'articolo
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection