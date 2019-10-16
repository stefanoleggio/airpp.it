@extends('templates.mail', [
    'title' => "Messaggio",
    'intro' => "C'è un nuovo messaggio!"
])
@section('content')
<tr>
    <td class="form_group form_main">
        Nome
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->name}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Cognome
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->surname}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Email
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->email}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Messaggio
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->msg}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Data e ora
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->date}}
    </td>
</tr>
@endsection