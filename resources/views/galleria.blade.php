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
    <div class="gallery">
        @foreach($albums as $album)
        <div class="albums__card">
            <div class="albums__thumbnail">
                <img src="/media/albums/thb__{{ $album->id }}" alt="">
            </div>
            <div class="albums__title">{{ $album->title }}</div>
        </div>
        @endforeach
    </div>
@endsection