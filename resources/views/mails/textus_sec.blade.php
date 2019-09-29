@extends('templates.mail',[
    'object' => 'Nuovo messaggio'
])
@section('content')
    <div class="main_container">
        <div class="mail__title heading-secondary">
            Dati del messaggio
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
                    Email
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->email }}
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
            <div class="row">
                <div class="col-1-of-2 table__desc">
                    Messaggio
                </div>
                <div class="col-1-of-2 table__data">
                    {{ $request->msg }}
                </div>
            </div>
        </div>
    </div>
@endsection