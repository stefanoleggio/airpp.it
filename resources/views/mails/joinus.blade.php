@extends('templates.mail', [
    'title' => $email[0]->title
])
@section('content')
<div>
    <pre style="font-family: inherit;">{{$email[0]->description}}</pre>
</div>
@endsection