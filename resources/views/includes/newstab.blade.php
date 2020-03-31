<div class="newstab__container u-container-fullwidth">
    <div class="newstab u-margin-top-medium u-display-inline-block">
        @if($newstab__state == '1')
        <div class="newstab__state" title="in corso">
            <i class="fas fa-thumbtack"></i>
        </div>
        @endif
        <div class="newstab__title heading-secondary-bis u-container-fullwidth u-left-text">
            {{$newstab__title}}
        </div>
        <div class="newstab__text paragraph paragraph--smaller u-margin-top-small">
            <pre>{{$newstab__text}}</pre>
        </div>
        <div class="newstab__links u-left-text">
            @if(isset($newstab__link))
            <a href="{{$newstab__link}}" class="btn__link normal u-color-secondary" target="blank">
                Locandina
            </a>
            @endif
        </div>
        <div class="newstab__info heading-tertiary u-right-text">
                {{$newstab__place}}
                {{date('d-m-Y', strtotime($newstab__date))}}
        </div>
    </div>
</div>
