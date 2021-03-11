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
    <div class="u-padding-normal-unique">
        <hr>
    </div>
    <div class="u-center-text u-margin-bottom-big">
        <div id="content">
            @include('includes.newstab')
        </div>
    </div>
    
    <script src="{{ asset('js/pagination.js') }}"></script>
@endsection