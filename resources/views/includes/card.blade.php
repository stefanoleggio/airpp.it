<div class="team__profile u-center-text u-display-inline-block">
    <div class="team__profile-photo" 
        @if($img != "0")
        style="background-image: url(/media/img/team/{{ $surname."_".$name }}.jpg);"
        @else
        style="background-image: url(/media/img/team/default.svg);"
        @endif
        >  
    </div>
    <div class="team__profile-name normal">
        {{ $name." ".$surname }}
    </div>
    @if($role != "0")
    <div class="team__profile-role small u-text-bold">
        {{ $role }}
    </div>
    @endif
    <div class="team__profile-description small">
        {{ $description }}
    </div>
</div>