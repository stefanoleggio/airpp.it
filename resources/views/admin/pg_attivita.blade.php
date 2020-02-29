@extends('templates.admin')
@section('content')
    @include('includes.admincard', 
        [
            'title' => 'Pagina Attività',
            'description' => 'Di seguito la lista di cosa si può modificare'
        ]
    )
    <div class="container">
    @include('includes.adminpages', 
        [
            'banners' => $co
        ]
    )
    @include('includes.adminpages', 
        [
            'banners' => $in
        ]
    )
    @include('includes.adminpages', 
        [
            'banners' => $pr
        ]
    )
    </div>
@endsection