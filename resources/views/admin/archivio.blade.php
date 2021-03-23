@extends('templates.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>
            Archivio
        </h3>
    </div>
    <div class="card-body">
        Elenco dei soci nell'archivio
        <div>
            <button type="submit" class="btn-primary btn mt-3" data-toggle="modal" data-target="#modal-for-new-card">
                Aggiungi
            </button>
        </div>
    </div>
    
</div>
<div class="mt-3">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Cerca" aria-label="Cerca">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>

<div class="mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    @if(isset($row->ultimo_anno_pagato) && strcmp($row->ultimo_anno_pagato, date("Y")) != 0 && $row->escluso == false)
                        <td scope="col" class="text-danger">{{$row->nome}}</td>
                        <td scope="col" class="text-danger">{{$row->cognome}}</i></td>
                    @else
                        <td scope="col">{{$row->nome}}</td>
                        <td scope="col">{{$row->cognome}}</td>
                    @endif
                    <td scope="col" class="utility" style="text-align:center"><button class="form_btn" style="border: none; background: none;" data-toggle="modal" data-target="#modal-for-card-{{ $row->id }}" ><i class="fas fa-edit"></i></button></td>
                </tr>
                <div class="modal fade" id="modal-for-card-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form method="POST" action="/admin/edit_news" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="input" class="form-control" id="nome" name="nome" value="{{ $row->nome }}">
                                </div>
                                <div class="form-group">
                                    <label for="cognome">Cognome</label>
                                    <input type="input" class="form-control" id="cognome" name="cognome" value="{{ $row->cognome }}">
                                </div>
                                <div class="form-group">
                                    <label for="place">Numero socio</label>
                                    <input type="input" class="form-control" id="numero_socio" name="numero_socio" value="{{ $row->numero_socio }}">
                                </div>
                                <div class="form-group">
                                    <label for="place">Ultimo anno pagato</label>
                                    <input type="input" class="form-control" id="ultimo_anno_pagato" name="ultimo_anno_pagato" value="{{ $row->ultimo_anno_pagato }}">
                                </div>
                                <div class="form-group">
                                    <label for="place">Codice fiscale</label>
                                    <input type="input" class="form-control" id="codice_fiscale" name="codice_fiscale" value="{{ $row->codice_fiscale }}">
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-link" data-toggle="collapse" href="#recapiti-{{ $row->id }}" role="button" aria-expanded="false" aria-controls="recapiti-{{ $row->id }}">
                                        Recapiti
                                    </a>
                                </div>
                                <div class="collapse" id="recapiti-{{ $row->id }}">
                                    <div class="form-group">
                                        <label for="place">Email</label>
                                        <input type="input" class="form-control" id="email" name="email" value="{{ $row->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="place">Cellulare</label>
                                        <input type="input" class="form-control" id="cellulare" name="cellulare" value="{{ $row->cellulare }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="place">Telefono</label>
                                        <input type="input" class="form-control" id="telefono" name="telefono" value="{{ $row->telefono }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-link" data-toggle="collapse" href="#indirizzo-{{ $row->id }}" role="button" aria-expanded="false" aria-controls="indirizzo-{{ $row->id }}">
                                        Indirizzo
                                    </a>
                                </div>
                                <div class="collapse" id="indirizzo-{{ $row->id }}">
                                    <div class="form-group">
                                        <label for="place">Via</label>
                                        <input type="input" class="form-control" id="via" name="via" value="{{ $row->via }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="place">Civico</label>
                                        <input type="input" class="form-control" id="civico" name="civico" value="{{ $row->civico }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="place">Cap</label>
                                        <input type="input" class="form-control" id="cap" name="cap" value="{{ $row->cap }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="place">Comune</label>
                                        <input type="input" class="form-control" id="comune" name="comune" value="{{ $row->comune }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="place">Provincia</label>
                                        <input type="input" class="form-control" id="provincia" name="provincia" value="{{ $row->provincia }}">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $row->id }}">
                                <button type="submit" class="btn btn-primary w_classic">Salva</button>
                                </form>
                                <form method="POST" action="/admin/delete_news" class="pt-3">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <input type="hidden" name="db" value="convegni">
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
            
        </tbody>
    </table>
    <div class="d-flex justify-content-center pt-5">
                <?php echo $data->links(); ?>
        </div>
</div>
@endsection