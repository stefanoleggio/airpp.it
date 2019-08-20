@extends('templates.mail',[
    'object' => 'Nuova donazione'
])
@section('content')
    <div>
        <div class="mail__title heading-secondary">
            Dati della donazione
        </div>
        <div class="row">
            <div class="col-1-of-2 table__desc">
                Nome
            </div>
            <div class="col-1-of-2">
                {{ $request->name }}
            </div>
        </div>
        <div class="row">
            <div class="col-1-of-2 table__desc">
                Cognome
            </div>
            <div class="col-1-of-2">
                {{ $request->surname }}
            </div>
        </div>
        <div class="row">
            <div class="col-1-of-2 table__desc">
                Email
            </div>
            <div class="col-1-of-2">
                {{ $request->email }}
            </div>
        </div>
        <div class="row">
            <div class="col-1-of-2 table__desc">
                Importo
            </div>
            <div class="col-1-of-2">
                {{ $request->amount }}
            </div>
        </div>
        <div class="row">
            <div class="col-1-of-2 table__desc">
                Data e ora
            </div>
            <div class="col-1-of-2">
                {{ $request->date }}
            </div>
        </div>
    </div>
@endsection