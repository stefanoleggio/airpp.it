@extends('templates.admin')

@section('content')
@if ($message = Session::get('success'))
        @include('includes.adminalert', 
            [
                'message' => $message
            ]
        )
    @endif
<div class="card">
    <div class="card-header">
        <h3>
            Galleria
        </h3>
    </div>
    <div class="card-body">
        Elenco degli album
        <div>
            <button class="btn btn-primary d-inline-block  mt-3" data-toggle="modal" data-target="#modal-for-card-add">
                Aggiungi
            </button>
        </div>
    </div>
</div>
<div class="container">
    @foreach($albums as $album)
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-sm text-center pt-2">
                    {{ $album->title }} 
                </div>
                <div class="col-sm text-center pt-2">
                    <img src="{{ $album->thb_path }}" class="img-thumbnail w-50" alt="">
                </div>
                <div class="col-sm text-center">
                    <div>
                        <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-{{ $album->id }}">
                            Modifica
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-primary d-inline-block mt-3" data-toggle="modal" onclick="window.location='/admin/galleria/{{ $album->id }}';">
                            Aggiungi Foto
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-for-card-{{ $album->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form method="POST" action="/admin/edit_album" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="input" class="form-control" id="title" name="title" value="{{ $album->title }}">
                    </div>
                    <div class="form-group">
                        <label for="file">Copertina</label>
                        <img src="{{ $album->thb_path }}" class="img-thumbnail w-25" alt="">
                        <input type="file" class="form-control-file" name="file" id="file"/>
                    </div>
                    <input type="hidden" name="id" value="{{ $album->id }}">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                    </form>
                    <form method="POST" action="/admin/delete_album" class="pt-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $album->id }}">
                        <button class="btn btn-danger w_classic" type="submit">Elimina</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
                <form method="POST" action="/admin/add_album" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="input" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="file">Copertina</label>
                        <input type="file" class="form-control-file" name="file" id="file"/>
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