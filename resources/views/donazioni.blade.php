@extends('templates.page')
@section('content')
    @if ($message = Session::get('success'))
        @include('includes.msg', 
            [
                'type' => 'success',
                'txt' => $message
            ])
        <?php Session::forget('success');?>
    @endif
    @if ($message = Session::get('error'))
        @include('includes.msg', 
            [
                'type' => 'error',
                'txt' => $message
            ])
        <?php Session::forget('error');?>
    @endif
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
                <div class="heading-secondary u-margin-bottom-medium u-color-secondary">
                {{ $datas[0]->title }}
                </div>
                <div class="paragraph">
                {{ $datas[0]->description }}
                </div>
                @include('includes.msg', 
                [
                    'type' => 'info',
                    'txt' => $msgs[0]->title,
                    'desc' => $msgs[0]->content
                ])
            </div>
            <div class="col-1-of-2 u-center-text">
                @include('includes.donationform')
            </div>
        </div>
    </section>
    <div class="row u-padding-normal">
        <div class="col-1-of-2 u-center-text">
            <div class="heading-secondary u-margin-bottom-medium u-color-secondary">
                {{ $datas[1]->title }}
            </div>
            <div class="paragraph">
                {{ $datas[1]->description }}
            </div>
        </div>
        <div class="col-1-of-2 u-center-text">
            <div class="heading-secondary u-margin-bottom-medium u-color-secondary">
                {{ $datas[2]->title }}
            </div>
            <div class="paragraph">
                {{ $datas[2]->description }}
            </div>
        </div>
    </div>
    @include('includes.privacymodal')
    @include('includes.googlescripts')
@endsection