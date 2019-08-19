<div class="newstab u-margin-top-big">
    @if($newstab__state == '1')
    <div class="newstab__state" title="in corso">
        <i class="fas fa-thumbtack"></i>
    </div>
    @endif
    <div class="newstab__title heading-secondary u-text-lowercase u-container-fullwidth u-left-text">
        {{$newstab__title}}
    </div>
    <div class="newstab__text paragraph paragraph--smaller u-margin-top-small">
        {{$newstab__text}}
    </div>
    <div class="newstab__links u-left-text">
        <a href="#" class="btn__link normal u-color-secondary">
            Locandina
        </a>
    </div>
    <div class="newstab__info heading-tertiary u-right-text">
            {{$newstab__place}}
            {{$newstab__date}}
    </div>
</div>