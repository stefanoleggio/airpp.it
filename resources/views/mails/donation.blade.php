@extends('templates.mail',[
    'object' => $email->title,
])
@section('content')
    <div>
        <div class="mail__title heading-secondary">
            Grazie mille {{ $request->name }}
        </div>
        <div class="">
            {{ $email->description }}
        </div>
    </div>
@endsection