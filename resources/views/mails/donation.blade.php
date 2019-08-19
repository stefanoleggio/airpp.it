@extends('templates.mail',[
    'object' => $email[0]->object,
])
@section('content')
    <div>
        <div class="mail__title heading-secondary">
            Grazie mille {{ $request->name }}
        </div>
        <div class="">
            {{ $email[0]->content }}
        </div>
    </div>
@endsection