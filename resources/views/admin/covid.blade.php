@extends('templates.admin')
@section('content')
    <div class="card">
    <div class="card-header">
        <h3>
            Articoli emergenza Covid-19
        </h3>
    </div>
    <div class="card-body">
        Elenco dei Articoli del Covid-19, è possibile modificarli ed aggiungerne di nuovi
        <div>
            <button type="submit" class="btn-primary btn mt-3" data-toggle="modal" data-target="#modal-for-new-card">
                Aggiungi
            </button>
        </div>
    </div>
</div>
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
                <form method="POST" action="/admin/edit_articoli" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input class="form-control" type="text" name="title" value="{{ $data->title }}" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <pre>
                            <textarea class="form-control" type="text" name="description" id="description">{{ $data->description }}</textarea>
                        </pre>
                    </div>
                    <div class="form-group mt-2">
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" name="file" id="file"/>
                            <a href="{{ $data->link }}" target="blank" class="mt-5">Articolo</a>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="hidden" name="db" value="articoli">
                    <input type="hidden" name="page_id" value="covid">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                    </form>
                    <form method="POST" action="/admin/delete_articoli" class="pt-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="db" value="articoli">
                        <input type="hidden" name="page_id" value="covid">
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
    <div class="d-flex justify-content-center pt-5">
                <?php echo $datas->links(); ?>
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
                <form method="POST" action="/admin/add_articoli" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <pre>
                            <textarea class="form-control" type="text" name="description" id="description"></textarea>
                        </pre>
                    </div>
                    <div class="form-group mt-2">
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control-file" name="file" id="file"/>
                        </div>
                    </div>
                    <input type="hidden" name="db" value="articoli">
                    <input type="hidden" name="page_id" value="covid">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
@endsection