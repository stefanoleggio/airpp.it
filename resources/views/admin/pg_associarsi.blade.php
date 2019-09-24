@extends('templates.admin')
@section('content')
    @if ($message = Session::get('success'))
        @include('includes.adminalert', 
            [
                'message' => $message
            ]
        )
    @endif
    @include('includes.admincard', 
        [
            'title' => 'Pagina Associarsi',
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