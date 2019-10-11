@if ($message = Session::get('success'))
<div class="alert alert-success" id="alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading"><pre>{{$message}}</pre></h4>
</div>
<?php Session::forget('success');?>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger" id="alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading"><pre>{{$message}}</pre></h4>
    @if ($errors->any())
        <div class="form__invalid form__group small u-margin-top-medium">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<?php Session::forget('error');?>
@endif
@if ($errors->any())
<div class="alert alert-danger" id="alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading">Errori</h4>
        <div class="form__invalid form__group small u-margin-top-medium">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
</div>
@endif