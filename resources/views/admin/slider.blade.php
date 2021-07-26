@extends('templates.admin')
@section('content')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h3 class="alert-heading">Attenzione</h3>
        <p>Il caricamento di immagini di grandi dimensioni potrebbe essere lento.</br>Caricare un file alla volta e aspettare durante l'upload.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>
                Slider
            </h3>
        </div>
        <div class="card-body">
            Elenco delle slides nella home, è possibile modificarle e aggiungerne di nuove. </br>
            La prima slide non è eliminabile ma è possibile modificare il suo contenuto in Pagine>Home.
            <div>

                <button type="submit" class="btn-primary btn mt-3" data-toggle="modal" data-target="#modal-for-new-card-img">
                    Aggiungi immagine
                </button>
                <button type="submit" class="btn-primary btn mt-3" data-toggle="modal" data-target="#modal-for-new-card-txt">
                    Aggiungi testo
                </button>
            </div>
        </div>
    </div>
    <div class="container">
    @foreach($slides as $data)
    @if($data->tipo == 1 )
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-sm text-center pt-2">
                    {{ $data->num }}°
                </div>
                <div class="col-sm text-center pt-2">
                    @if($data->titolo == '')
                    {{ str_limit($data->descrizione, $limit = 30, $end = '...') }}
                    @else
                    {{ str_limit($data->titolo, $limit = 30, $end = '...') }}
                    @endif
                </div>

                <div class="col-sm text-center">
                    <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-{{ $data->id }}">
                        Modifica
                    </button>
                </div>
                <div class="col-1 text-center pt-2 mr-2">
                    <div class="row">
                    <div class="col-2">
                    <form method="POST" action="/admin/up_slide" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button class="form_btn" style="border: none; background: none;"><i class="fas fa-arrow-up"></i></button>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                    </form>
                    </div>
                    <div class="col-2">
                    <form method="POST" action="/admin/down_slide" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button class="form_btn" style="border: none; background: none;"><i class="fas fa-arrow-down"></i></button>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-for-card-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Modifica
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/edit_slide" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="spiegone_testo">
                        <p>
                            Nella tipologia Testo l'unico campo obbligatorio è la "descrizione".</br>
                            Si consiglia di usare un titolo di poche parole per rendere la slide più bella.</br>
                            Nel campo link è richiesto di inserire un collegamento ipertestuale ("http://...").</br>
                            Nel campo testo link è richiesto di inserire la parola o frase che verrà visualizzata cliccabile.
                        </p>
                    </div>
                    <div id="type_1">
                        <div class="form-group">
                            <label for="titolo">Titolo</label>
                            <input type="input" class="form-control" id="titolo" name="titolo" value="{{$data->titolo}}">
                        </div>
                        <div class="form-group">
                            <p>Descrizione</p>
                            <pre><textarea class="form-control" name="descrizione" id="descrizione">{{$data->descrizione}}</textarea></pre>
                        </div>
                        <div class="form-group">
                            <label for="title">Testo link</label>
                            <input type="input" class="form-control" id="link_txt" name="link_txt" value="{{$data->link_txt}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Link</label>
                        <input type="input" class="form-control" id="link" name="link" value="{{$data->link}}">
                    </div>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                <form method="POST" action="/admin/delete_slide" class="pt-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button class="btn btn-danger w_classic" type="submit">Elimina</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if($data->tipo == 2)
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
            <div class="col-sm text-center pt-2">
                    {{ $data->num }}°
            </div>
            <div class="col-sm text-center pt-2">
                    <img src="{{ asset($data->img) }}" alt="" class="img-thumbnail" style="width: 4.3rem;">
                </div>

                <div class="col-sm text-center">
                    <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-{{ $data->id }}">
                        Modifica
                    </button>
                </div>
                <div class="col-1 text-center pt-2 mr-2">
                    <div class="row">
                    <div class="col-2">
                    <form method="POST" action="/admin/up_slide" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button class="form_btn" style="border: none; background: none;"><i class="fas fa-arrow-up"></i></button>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                    </form>
                    </div>
                    <div class="col-2">
                    <form method="POST" action="/admin/down_slide" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button class="form_btn" style="border: none; background: none;"><i class="fas fa-arrow-down"></i></button>
                        <input type="hidden" name="id" value="{{ $data->id }}">
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-for-card-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Modifica
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/edit_slide" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="spiegone_img">
                        <p>
                            L'immagine deve rispettare determinate dimensioni, bisogna quindi creare la grafica con <b>Microsoft Publisher</b> (presente nel pacchetto office) usando il modello qui sotto.</br>
                            Una volta creata la slide esportarla in jpeg e procedere al caricamento.</br>
                            Nel campo link è possibile inserire un collegamento ipertestuale ("http://...") per rendere l'immagine cliccabile.</br>
                        </p>
                        <a href="/media/formats/airpp.pub">Scarica modello</a>
                    </div>
                    <div class="form-group mt-2 text-capitalize">
                        <label for="img">Immagine</label>
                        <input type="file" class="form-control-file" name="img" id="img"/>
                    </div>
                    <img src="{{ asset($data->img) }}" alt="" class="img-thumbnail">
                    <div class="form-group">
                        <label for="title">Link</label>
                        <input type="input" class="form-control" id="link" name="link" value="{{$data->link}}">
                    </div>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                <form method="POST" action="/admin/delete_slide" class="pt-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button class="btn btn-danger w_classic" type="submit">Elimina</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <div class="d-flex justify-content-center pt-5">
        <?php echo $slides->links(); ?>
    </div>
    <div class="modal fade" id="modal-for-new-card-img" tabindex="-1" role="dialog" aria-hidden="true">        
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Aggiungi Immagine
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/add_slide_img" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                    <p>
                        L'immagine deve rispettare determinate dimensioni, bisogna quindi creare la grafica con <b>Microsoft Publisher</b> (presente nel pacchetto office) usando il modello qui sotto.</br>
                        Una volta creata la slide esportarla in jpeg e procedere al caricamento.</br>
                        Nel campo link è possibile inserire un collegamento ipertestuale ("http://...") per rendere l'immagine cliccabile.</br>
                    </p>
                        <a href="/media/formats/airpp.pub">Scarica modello</a>
                    </div>
                    <div class="form-group mt-2 text-capitalize">
                        <label for="img">Immagine</label>
                        <input type="file" class="form-control-file" name="img" id="img"/>
                    </div>
                    <div class="form-group">
                        <label for="title">Link</label>
                        <input type="input" class="form-control" id="link" name="link" value="">
                    </div>
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-for-new-card-txt" tabindex="-1" role="dialog" aria-hidden="true">        
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Aggiungi Testo
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/add_slide_txt" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <p>
                            Nella tipologia Testo l'unico campo obbligatorio è la "descrizione".</br>
                            Si consiglia di usare un titolo di poche parole per rendere la slide più bella.</br>
                            Nel campo link è richiesto di inserire un collegamento ipertestuale ("http://...").</br>
                            Nel campo testo link è richiesto di inserire la parola o frase che verrà visualizzata cliccabile.
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="titolo">Titolo</label>
                        <input type="input" class="form-control" id="titolo" name="titolo" value="">
                    </div>
                    <div class="form-group">
                            <p>Descrizione</p>
                            <pre><textarea class="form-control" name="descrizione" id="descrizione"></textarea></pre>
                    </div>
                    <div class="form-group">
                        <label for="title">Testo link</label>
                        <input type="input" class="form-control" id="link_txt" name="link_txt" value="">
                    </div>
                    <div class="form-group">
                        <label for="title">Link</label>
                        <input type="input" class="form-control" id="link" name="link" value="">
                    </div>
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection