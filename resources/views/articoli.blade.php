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
        @include('includes.textcontainer',
        [
            'text' => $text[0]->description        
        ])
    </div>
@endsection