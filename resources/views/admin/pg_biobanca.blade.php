@extends('templates.admin')
@section('content')
    @include('includes.admincard', 
        [
            'title' => 'Pagina Biobanca',
            'description' => 'Di seguito la lista di cosa si può modificare'
        ]
    )
    <div class="container">
        @include('includes.adminpages', 
        [
            'views' => $views,
            'banners' => $banners
        ]
    )
    </div>
@endsection