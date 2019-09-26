@extends('templates.mail',[
    'object' => 'Nuova donazione'
])
@section('content')
    <div class="main_container">
        <div class="mail__title heading-secondary">
            Dati della donazione
        </div>
        <div class="table">
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Nome
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Cognome
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->surname }}
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Codice fiscale
                </div>
                <div class="col-1-of-2 table__cf">
                    {{ $request->cf }}
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Via e civico
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->via }}
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Cap
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->cap }}
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Comune
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->comune }}
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Email
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->email }}
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Importo
                </div>
                <div class="col-1-of-2 table__data table__amount">
                    {{ $request->amount }}
                    &euro;
                </div>
            </div>
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Data e ora
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->date }}
                </div>
            </div>
        </div>
    </div>
@endsection