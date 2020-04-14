@extends('templates.mail', [
    'title' => $email[0]->title
])
@section('content')
<div>
    {{$email[0]->description}}
</div>
@endsection


