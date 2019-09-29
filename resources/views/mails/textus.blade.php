@extends('templates.mail',[
    'object' => "Messaggio",
])
@section('content')
    <div>
        <div class="mail__title heading-secondary">
            {{ $request->name }}, grazie per averci scritto
        </div>
        <div class="">
            Messaggio inviato, provvederemo presto a risponderti
        </div>
    </div>
@endsection