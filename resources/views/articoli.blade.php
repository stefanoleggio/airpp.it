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
            <!-- -->

            <div class="u-center-text u-container-fullwidth" id="msg__container">
    <div class="u-center-text">
    <div style="width: 70rem" class="u-display-inline-block tmp" >
    <div class="msg msg__info u-display-inline-block">
        <span onclick="document.getElementById('msg__container').style.display='none'" class="msg__close u-font-weight-bold">&times;</span>                
        <div class="normal u-font-weight-bold">
            <i class="fa fa-info-circle"></i>Emergenza Covid-19
            </div>
                <div class="msg__description small margin-top-small u-text-align-left">
                <pre>Abbiamo creato una pagina dedicata per l'emergenza, 
leggi gli articoli sul Covid-19 per tenerti informato!</pre>
                <a href="/covid" class="btn__link normal u-color-secondary" target="blank">
                    pagina Covid-19</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <style>
            @media only screen and (max-width: 600px) {
                .tmp{
                    width: 100%!important;
                }
            }

    </style>
<!-- -->
    <div class="u-padding-normal-unique">
        <hr>
    </div>
    <div class="u-center-text u-margin-bottom-big">
        @foreach($posts as $post)
        <div class="newstab__container u-container-fullwidth">
            <div class="newstab u-margin-top-medium u-display-inline-block">
                <div class="newstab__title heading-secondary-bis u-container-fullwidth u-left-text">
                    {{$post->title}}
                </div>
                <div class="newstab__text paragraph paragraph--smaller u-margin-top-small">
                    <pre>{{$post->description}}</pre>
                </div>
                <div class="newstab__links u-left-text">
                    <a href="{{$post->link}}" class="btn__link normal u-color-secondary" target="blank">
                        Scarica l'articolo
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="u-margin-top-medium small u-center-text">
            <?php echo $posts->links(); ?>
        </div>
    </div>
@endsection