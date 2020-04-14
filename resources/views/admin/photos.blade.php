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
            Foto di "{{ $album[0]->title }}"
        </h3>
    </div>
    <div class="card-body">
        Elenco delle foto
        <div>
            <button class="btn btn-primary d-inline-block  mt-3" data-toggle="modal" data-target="#modal-for-card-add">
                Aggiungi
            </button>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
    <?php
        $i = 0;
    ?>
    @foreach($photos as $photo)
    <div class="col-lg-4">
        <img src="{{ $photo->link }}" class="img-thumbnail w-50" data-toggle="modal" data-target="#modal-for-card-{{ $photo->id }}">
        <div class="modal fade" id="modal-for-card-{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form method="POST" action="/admin/delete_photo" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <img src="{{ $photo->link }}" class="img-thumbnail w-100" alt="">
                    </div>
                    <input type="hidden" name="album_id" value="{{ $album[0]->id }}">
                    <input type="hidden" name="id" value="{{ $photo->id }}">
                    <input type="hidden" name="db" value="photo">
                    <button type="submit" class="btn btn-primary w_classic">Elimina</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
        $i++;
        if($i == 3){
            echo '</div><div class="row mt-4">';
            $i=0;
        }
    ?>
    @endforeach
    </div>
    <div class="d-flex justify-content-center pt-5">
                <?php echo $photos->links(); ?>
    </div>
    </div>
    <div class="modal fade" id="modal-for-card-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Aggiungi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/add_photo" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input type="file" class="form-control-file" name="file[]" id="file" multiple/>
                    </div>
                    <input type="hidden" name="album_id" value="{{ $album[0]->id }}">
                    <input type="hidden" name="db" value="photo">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
@endsection
