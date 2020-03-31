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
    <div class="u-container-fullwidth heading-secondary u-center-text u-margin-top-medium u-color-black">
                Articoli dalla rete
            </div>
    <div class="textcontainer">
            <div class="u-center-text">
                <div class="paragraph">
                    <ul style="list-style-type: disc;">
                    @foreach($links as $link)
                        <li style="padding: 1rem;">
                        @include('includes.link',[
                            'text' => $link->text,
                            'link' => $link->link
                        ])
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="u-margin-top-medium small u-center-text">
                    <?php echo $links->links(); ?>
                </div>
            </div>
        </div>
@endsection