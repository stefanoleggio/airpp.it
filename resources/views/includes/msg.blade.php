<div class="u-center-text u-container-fullwidth" id="msg__container">
    <div class="msg msg__{{ $type }} u-display-inline-block">
        <span onclick="document.getElementById('msg__container').style.display='none'" class="msg__close u-font-weight-bold">&times;</span>                
        <div class="normal u-font-weight-bold">
            @if($type == 'success')
                <i class="fa fa-check"></i>
            @endif
            @if($type == 'error')
                <i class="fa fa-times-circle"></i>
            @endif
            @if($type == 'warning')
                <i class="fas fa-exclamation-triangle"></i>            
            @endif
            @if($type == 'info')
                <i class="fa fa-info-circle"></i>
            @endif
            {{ $txt }}
        </div>
        @if($type == 'info')
            <div class="msg__description small margin-top-small u-text-align-left">
                {{ $desc }}
            </div>
        @endif
    </div>
</div>