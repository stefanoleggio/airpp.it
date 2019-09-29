@if ($message = Session::get('success'))
        @include('includes.msg', 
            [
                'type' => 'success',
                'txt' => $message
            ])
        <?php Session::forget('success');?>
@endif
@if ($message = Session::get('error'))
    @include('includes.msg', 
        [
            'type' => 'error',
            'txt' => $message
        ])
    <?php Session::forget('error');?>
@endif