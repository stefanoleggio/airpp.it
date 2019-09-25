@extends('templates.admin')

@section('content')
@include('includes.admincard', 
        [
            'title' => 'Dashboard',
            'description' => 'Benvenuto nel pannello amministrativo di airpp.it'
        ]
    )
@endsection
