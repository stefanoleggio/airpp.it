@extends('templates.admin')
@section('content')
    @include('includes.admincard', 
        [
            'title' => 'Pagina Segnalazioni',
            'description' => 'Di seguito la lista di cosa si può modificare'
        ]
    )
    <div class="container">
    @include('includes.adminpages', 
        [
            'banners' => $banners
        ]
    )
    </div>
@endsection