@extends('templates.page')
@section('content')
    @include('includes.photobanner', 
        [
            'title' => $album[0]->title,
            'img' => '/media/svg/photos_photo.svg'
        ])
    <div class="gallery u-padding-normal u-bgcolor-color-grey">
        <div class="row">
            <?php
                $i = 0;
            ?>
            @foreach($photos as $photo)
            <?php
            $i++;
            if($i == 5)
            {
                $i = 1;
                echo '</div> <div class="row">';
            }
            ?>
            <div class="col-1-of-4 u-center-text">
                <div class="photo">
                    <img src="{{ $photo->img_path }}" alt="">
                </div>
            </div>
        @endforeach
                </div>
    </div>
@endsection