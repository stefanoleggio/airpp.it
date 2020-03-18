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
    <div class="u-margin-bottom-big">
    </div>
@endsection