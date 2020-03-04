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
<div class="textcontainer">
    <div class="u-center-text">
        <div class="paragraph">
            <pre>@include('includes.cookie')</pre>
        </div>
        </div>
    </div>
</div>
@endsection