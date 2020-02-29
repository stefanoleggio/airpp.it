@extends('templates.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>
            Utenti
        </h3>
    </div>
    <div class="card-body">
        Lista degli utenti
        <div>
            <button type="submit" class="btn-primary btn mt-3" data-toggle="modal" data-target="#modal-for-new-card">
                Aggiungi
            </button>
        </div>
    </div>
</div>
    <div class="container">
    @foreach($users as $user)
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm text-center pt-2">
                        {{ $user->name }} 
                    </div>
                    <div class="col-sm text-center pt-2">
                        {{ $user->role }} 
                    </div>
                    <div class="col-sm text-center">
                        <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-{{ $user->id }}">
                            Modifica
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-for-card-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Modifica
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="/admin/edit_users" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Nome</label>
                            <input type="input" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="input" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Code</label>
                            <input type="input" class="form-control" id="code" name="code" value="{{ $user->code }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Ultimo accesso</label>
                            <div>{{ $user->last_login_at }}</div>
                        </div>
                        <div class="form-group">
                            <label for="title">Ultimo ip</label>
                            <div>{{ $user->last_login_ip }}</div>
                        </div>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary w_classic">Salva</button>
                    </form>
                    <form method="POST" action="/admin/delete_users" class="pt-3">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="hidden" name="db" value="users">
                        <button class="btn btn-danger w_classic" type="submit">Elimina</button>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="modal fade" id="modal-for-new-card" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Aggiungi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/admin/add_users" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Nome</label>
                        <input type="input" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="input" class="form-control" id="email" name="email">
                    </div>
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
                        <label for="title">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="title">Code</label>
                        <input type="password" class="form-control" id="code" name="code">
                    </div>
                    <div class="form-group">
                        <label for="title">Conferma password</label>
                        <input type="password" class="form-control" id="password_c" name="password_c">
                    </div>
                    <input type="hidden" name="db" value="users">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
@endsection