@extends('templates.admin')
@section('content')
@include('includes.admincard', 
        [
            'title' => 'Email',
            'description' => 'Qui puoi modificare il contenuto delle email automatiche'
        ]
    )
<div class="container">
@foreach($datas as $data)
<div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-sm text-center pt-2">
                    {{ $data->title }} 
                </div>
                <div class="col-sm text-center">
                    <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-{{ $data->id }}">
                        Modifica
                    </button>
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
                <form method="POST" action="/admin/edit_pages" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="input" class="form-control" id="title" name="title" value="{{ $data->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea class="form-control" id="description" name="description">{{ $data->description }}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="hidden" name="db" value="views">
                    <input type="hidden" name="pg_name" value="{{ $data->page_id }}">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
 </div>
@endsection