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
    <section class="gallery u-padding-normal u-bgcolor-color-grey">
        <div class="gallery__commands big u-center-text">
            <a title="torna in dietro"><i class="fas fa-arrow-left"></i></a>
            <div class="u-display-inline-block">
                <p class="u-color-primary u-display-inline-block">  galleria/</p>
            </div>
        </div>
        <hr>
        <div class="gallery__view u-margin-top-big">
            <div class="gallery__view-folders">
                <div class="row">
                    <div class="col-1-of-3 u-center-text">
                        <i class="fas fa-folder huge"></i>
                        <div class="normal">cartella</div>
                    </div>
                    <div class="col-1-of-3 u-center-text">
                        <i class="fas fa-folder huge"></i>
                        <div class="normal">cartella</div>
                    </div>
                    <div class="col-1-of-3 u-center-text">
                        <i class="fas fa-folder huge"></i>
                        <div class="normal">cartella</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1-of-3 u-center-text">
                        <i class="fas fa-folder huge"></i>
                        <div class="normal">cartella</div>
                    </div>
                    <div class="col-1-of-3 u-center-text">
                        <i class="fas fa-folder huge"></i>
                        <div class="normal">cartella</div>
                    </div>
                </div>
            </div>
            <div class="gallery__view-img">
            </div>
        </div>
    </section>
@endsection