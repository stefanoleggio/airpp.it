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
                <th scope="col" style="border-right: none!important;">Data iscrizione</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
                <tr>
                    <td scope="col">{{$data->nome}}</td>
                    <td scope="col">{{$data->cognome}}</td>
                    <td scope="col">{{$data->data_iscrizione}}</td>
                    <td scope="col" class="utility" style="text-align:center"><button class="form_btn" style="border: none; background: none;" data-toggle="modal" data-target="#editRoom_"><i class="fas fa-edit"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection