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
            'title' => 'Pagina Statuto',
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