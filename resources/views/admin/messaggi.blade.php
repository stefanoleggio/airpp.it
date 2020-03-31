@extends('templates.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>
            Messaggi
        </h3>
    </div>
    <div class="card-body">
        Elenco dei messaggi ricevuti
    </div>
</div>
<div class="container">
@foreach($datas as $data)
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-sm text-center pt-2">
                    {{ $data->name }} 
                    {{ $data->surname }}
                </div>
                <div class="col-sm text-center pt-2">
                    {{$data->email}}
                </div>
                <div class="col-sm text-center pt-2">
                    {{ $data->date }}
                </div>

                <div class="col-sm text-center">
                    <button class="btn btn-primary d-inline-block" data-toggle="modal" data-target="#modal-for-card-{{ $data->id }}">
                        Dettagli
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-for-card-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
            Dettagli
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm">Nome</div>
            <div class="col-sm">{{ $data->name }}</div>
        </div>
        <div class="row">
            <div class="col-sm">Cognome</div>
            <div class="col-sm">{{ $data->surname }}</div>
        </div>
        <div class="row">
            <div class="col-sm">Email</div>
            <div class="col-sm">{{ $data->email }}</div>
        </div>
        <div class="row">
            <div class="col-sm">Messaggio</div>
            <div class="col-sm"><pre>{{$data->msg}}</pre></div>
        </div>
        <div class="row">
            <div class="col-sm">Data e ora</div>
            <div class="col-sm">{{ $data->date }}</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>
    @endforeach
    <div class="d-flex justify-content-center pt-5">
                <?php echo $datas->links(); ?>
        </div>
    </div>
@endsection