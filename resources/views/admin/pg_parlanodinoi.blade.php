@extends('templates.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>
                Pagina Parlano di noi
            </h3>
        </div>
        <div class="card-body">
            Di seguito la lista di cosa si può modificare, è possibile aggiungere nuovi link
            <div>
                <button type="submit" class="btn-primary btn mt-3" data-toggle="modal" data-target="#modal-for-new-card">
                    Aggiungi
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-for-new-card" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form method="POST" action="/admin/add_links" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Testo</label>
                        <input type="input" class="form-control" id="text" name="text">
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="input" class="form-control" id="link" name="link">
                    </div>
                    <input type="hidden" name="db" value="parlanodinoi">
                    <input type="hidden" name="page_id" value="parlanodinoi">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @include('includes.adminpages', 
        [
            'banners' => $banners
        ]
    )
    @foreach($links as $link)
        @include('includes.adminlinks')
    @endforeach
    </div>
@endsection