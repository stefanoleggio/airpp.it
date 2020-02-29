@extends('templates.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>
            Profilo
        </h3>
    </div>
    <div class="card-body">
        Il tuo profilo nel pannello amministrativo
    </div>
</div>
<div class="container">
    <form method="POST" action="/admin/edit_profilo" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Nome</label>
            <input type="input" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="input" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <input type="hidden" name="id" value="{{ $user->id }}">
        <button type="submit" class="btn btn-primary w_classic">Salva</button>
    </form>
    <button type="submit" class="btn-primary btn mt-3" data-toggle="modal" data-target="#modal-for-change-pssw">
                Cambia Password
    </button>
</div>

 <div class="modal fade" id="modal-for-change-pssw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Cambio Password
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/edit_pssw" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div>
                            La password deve avere almeno:
                            <ul>
                                <li>8 caratteri</li>
                                <li>1 carattere maiuscolo</li>
                                <li>1 carattere minuscolo</li>
                                <li>1 numero</li>
                                <li>1 carattere speciale (# ? ! @ $ % ^ & * -)</li>
                            </ul>
                        </div>
                        <label for="title">Nuova Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="title">Conferma Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary w_classic">Salva</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
@endsection