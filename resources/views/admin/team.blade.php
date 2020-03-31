@extends('templates.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>
                Team
            </h3>
        </div>
        <div class="card-body">
            Elenco dei componenti del team, è possibile modificarli ed aggiungerne di nuovi
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
                <div class="col-sm text-center pt-2 text-capitalize">
                    {{ $data->name." ".$data->surname }} 
                </div>
                <div class="col-sm text-center pt-2 text-capitalize">
                    {{ $data->team_id }} 
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
                <form method="POST" action="/admin/edit_team" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group text-capitalize">
                        <label for="name">Team identificativo</label>
                        <div>{{ $data->team_id}}</div>
                    </div>
                    <div class="form-group text-capitalize">
                        <label for="name">Nome</label>
                        <input type="input" class="form-control" id="name" name="name" value="{{ $data->name}}">
                    </div>
                    <div class="form-group text-capitalize">
                        <label for="surname">Cognome</label>
                        <input type="input" class="form-control" id="surname" name="surname" value="{{ $data->surname }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Ruolo</label>
                        <input type="input" class="form-control" id="role" name="role" value="{{ $data->role }}">
                    </div>
                    <div class="form-group text-capitalize">
                        <label for="description">Descrizione</label>
                        <pre><textarea class="form-control" id="description" name="description">{{$data->description}}</textarea></pre>
                    </div>
                    <div class="form-group mt-2 text-capitalize">
                        <div class="form-group">
                            <div>Immagine</div>
                            <div class="team_img mt-3 mb-3" style="background-image: url({{ $data->img_path}});">  
                            </div>
                            <input type="file" class="form-control-file" name="file" id="file"/>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <input class="check" type="checkbox" name="checkbox" id="checkbox">
                        <label class="form-check-label" for="check">
                            Immagine di default
                        </label>
                    </div>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="hidden" name="db" value="team">
                    <input type="hidden" name="pg_name" value="{{ $data->team_id }}">
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                <form method="POST" action="/admin/delete_team" class="pt-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="db" value="team">
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
                <form method="POST" action="/admin/add_team" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group text-capitalize">
                        <label for="team_id">Team identificativo</label>
                        <ul>
                            <li>consiglio direttivo</li>
                            <li>comitato scientifico</li>
                            <li>segreteria scientifica e amministrativa</li>
                            <li>comitato eventi</li>
                            <li>comitato etico</li>
                        </ul>
                        <input type="input" class="form-control" id="team_id" name="team_id">
                    </div>
                    <div class="form-group text-capitalize">
                        <label for="name">Nome</label>
                        <input type="input" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group text-capitalize">
                        <label for="surname">Cognome</label>
                        <input type="input" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="form-group">
                        <label for="title">Ruolo</label>
                        <input type="input" class="form-control" id="role" name="role" value="">
                    </div>
                    <div class="form-group text-capitalize">
                        <label for="description">Descrizione</label>
                        <pre><textarea class="form-control" id="description" name="description"></textarea></pre>
                    </div>
                    <div class="form-group mt-2 text-capitalize">
                        <div class="form-group">
                            <div>Immagine</div>
                            <div class="team_img mt-3 mb-3">  
                            </div>
                            <input type="file" class="form-control-file" name="file" id="file"/>
                        </div>
                    </div>
                    <input type="hidden" name="db" value="team">
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