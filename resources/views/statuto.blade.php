@extends('templates.page')
@section('content')
@foreach($banners as $banner)
<div class="row info__tab">
    <div class="col-1-of-2 u-center-text">
        <div class="heading-secondary u-margin-bottom-medium u-color-black">
            {{$banner->title}}
        </div>
        <div class="paragraph">
            <pre>{{$banner->description}}</pre>
            <a href="{{$datas[0]->link}}" class="btn__link normal u-color-secondary" target="blank">
                Scarica lo statuto
            </a>
        </div>
        </div>
        <div class="col-1-of-2">
            <div class="info__img__container">
                <img class="info__img img_svg" src={{asset($banner->img)}}>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection