<div class="team__profile u-center-text u-display-inline-block">
    <div class="team__container">
        <div class="team__profile-photo" style="background-image: url({{ $img }});">  
        </div>
    </div>
    <div class="team__profile-name normal">
        {{ $name." ".$surname }}
    </div>
    @if(isset($role))
    <div class="team__profile-role small u-text-bold">
        {{ $role }}
    </div>
    @endif
    <div class="team__profile-description small">
        {{ $description }}
    </div>
</div>