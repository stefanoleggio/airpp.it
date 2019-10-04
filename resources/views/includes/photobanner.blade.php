<div class="row info__tab">
    <div class="col-1-of-2 u-center-text">
        <div class="heading-secondary u-margin-bottom-medium u-color-black">
            {{$title}}
        </div>
        <div>
            <button class="btn btn__primary btn__medium u-display-inline-block" onclick="window.location='/galleria';">
                Torna indietro
            </button>
        </div>
        </div>
        <div class="col-1-of-2">
            <div class="info__img__container">
                <img class="info__img" src={{asset($img)}}>
            </div>
        </div>
    </div>
</div>