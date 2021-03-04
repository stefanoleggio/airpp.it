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

    <div class="container" id="logs">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Data e ora</th>
                        <th scope="col">Username</th>
                        <th scope="col" style="border-right: none!important;">IP address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td scope="col">{{date('d-m-Y H:i:s', strtotime($log->login_at))}} </td>
                        <td scope="col">{{ $log->user }} </td>
                        <td scope="col">{{ $log->ip }} </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-center pt-5">
            <?php echo $logs->links(); ?>
    </div>

    <script>
        $(document).ready(function(){

        $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
        });

        function fetch_data(page)
        {
        $.ajax({
        url:"/logs/fetch_logs?page="+page,
        success:function(data)
        {
            $('#logs').html(data);
        }
        });
        }
        
        });
    </script>
@endsection