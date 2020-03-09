@extends('templates.mail', [
    'title' => "Messaggio"
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
        Codice fiscale
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->cf}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Via
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->via}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Civico
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->civico}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Cap
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->cap}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Comune
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->comune}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Provincia
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->provincia}}
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
        Telefono
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->telefono}}
    </td>
</tr>
<tr>
    <td class="form_group form_main" style="padding-top: 2rem;">
        Importo
    </td>
</tr>
<tr>
    <td class="form_group">
        {{$request->amount}}
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