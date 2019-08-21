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
    <div class="u-center-text">
        <div class="u-display-inline-block">
            @foreach($posts as $post)
                @include('includes.newstab', 
                [
                    'newstab__title' => $post->title,
                    'newstab__text' => $post->description,
                    'newstab__place' => $post->place,
                    'newstab__date' => $post->date,
                    'newstab__state' => $post->active,
                    'newstab__link' => $post->link,
                ])
            @endforeach
        </div>
    </div>
@endsection