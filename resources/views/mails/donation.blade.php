@extends('templates.mail', [
    'title' => $email[0]->title
])
@section('content')
<tr>
    <td>
        <pre style="font-family: inherit;">{{$email[0]->description}}</pre>
    </td>
</tr>
@endsection