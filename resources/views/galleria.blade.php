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
    <div class="gallery u-padding-normal">
        <div class="row">
            <?php
                $i = 0;
            ?>
            @foreach($albums as $album)
                <?php
                $i++;
                if($i == 4)
                {
                    $i = 1;
                    echo '</div> <div class="row">';
                }
                ?>
                <div class="col-1-of-3 u-center-text">
                    @include('includes.albumscard',[
                        'title' => $album->title,
                        'id' => $album->id,
                        'thb_path' => $album->thb_path
                    ])
                </div>
            @endforeach
        </div>
    </div>
    
@endsection