@extends('templates.mail', [
    'title' => "Messaggio"
])
@section('content')
<div>
<b>Nome: </b>{{mb_strtoupper($request->name)}}
</div>
<div>
<b>Cognome: </b>{{mb_strtoupper($request->surname)}}
</div>
<div>
<b>Email: </b>{{mb_strtoupper($request->email)}}
</div>
<div>
<b>Messaggio: </b>
</div>
<div>
<pre>{{$request->msg}}</pre>
</div>
<div>
<b>Data e ora: </b>{{date('d-m-Y H:i:s', strtotime($request->date))}}
</div>
@endsection