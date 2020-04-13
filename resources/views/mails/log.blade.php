@extends('templates.mail', [
    'title' => 'Nuovo accesso'
])
@section('content')
<div>
    Nuovo accesso di {{ $request->email }} da {{ $request->getClientIp() }}
</div>
@endsection