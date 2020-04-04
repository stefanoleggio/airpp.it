@extends('templates.admin')
@section('content')
    @include('includes.admincard', 
        [
            'title' => 'Pagina Contatti',
            'description' => 'Di seguito la lista di cosa si può modificare'
        ]
    )
    <div class="container">
    @include('includes.adminpages', 
        [
            'banners' => $banners
        ]
    )
    @foreach($contacts as $contact)
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-sm text-center pt-2">
                    {{$contact->name}}
                </div>
                <div class="col-sm text-center">
                    <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-contact-{{ $contact->id }}">
                        Modifica
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-for-card-contact-{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form method="POST" action="/admin/edit_contacts" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group mt-2">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="input" class="form-control" id="email" name="email" value="{{ $contact->email }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Telefono</label>
                        <input type="input" class="form-control" id="telefono" name="telefono" value="{{ $contact->telefono }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Indirizzo</label>
                        <input type="input" class="form-control" id="sede" name="sede" value="{{ $contact->sede }}">
                    </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $contact->id }}">
                    <input type="hidden" name="db" value="contacts">
                    <input type="hidden" name="pg_name" value="contatti">
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