@extends('templates.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>
            Accessi
        </h3>
    </div>
    <div class="card-body">
        Lista degli ultimi accessi
        @include('includes.adminclearbtn',[
            'value' => 'logs'
        ])
    </div>
</div>
    <div class="container">
    @foreach($logs as $log)
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm text-center pt-2">
                        {{date('d-m-Y H:i:s', strtotime($log->login_at))}} 
                    </div>
                    <div class="col-sm text-center pt-2">
                        {{ $log->user }} 
                    </div>
                    <div class="col-sm text-center pt-2">
                        {{ $log->ip }} 
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <div class="d-flex justify-content-center pt-5">
                <?php echo $logs->links(); ?>
        </div>
    </div>
@endsection