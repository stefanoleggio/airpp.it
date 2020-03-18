@extends('templates.mail', [
    'title' => $email[0]->title
])
@section('content')
<tr>
    <td>
        {{$email[0]->description}}
    </td>
</tr>
@endsection