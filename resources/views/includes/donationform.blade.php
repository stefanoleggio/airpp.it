<form method="POST" class="form u-padding-normal u-display-inline-block" action="{!! URL::to('donationspaypal') !!}">
    {{ csrf_field() }}
    <div class="form__group">
        <div class="row">
            <div class="col-1-of-2">
                <div class="form__label">
                    Nome
                </div>
                <input type="text" value="{{ old('name') }}" class="form__input @if ($errors->has('name')) form__input-invalid @endif" name="name" placeholder="Inserisci il tuo nome">
            </div>
            <div class="col-1-of-2">
                <div class="form__label">
                    Cognome
                </div>
                <input type="text" value="{{ old('surname') }}" class="form__input @if ($errors->has('surname')) form__input-invalid @endif" name="surname" placeholder="Inserisci il tuo cognome">
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__label">
            Codice fiscale
        </div>
        <input type="text" value="{{ old('cf') }}" class="form__input @if ($errors->has('cf')) form__input-invalid @endif" name="cf" placeholder="Inserisci il tuo codice fiscale">
    </div>
    <!-- Google position localization -->
    <div class="form__group">
        <div class="form__label">
            Cerca indirizzo con Google <i class="fas fa-map-marker-alt"></i>
        </div>
        <input type="text"  class="form__input" id="autocomplete" onFocus="geolocate()" name="address" onFocus="geolocate()" type="text" placeholder="Inserisci il tuo indirizzo">
    </div>
    <div class="form__group">
        <div class="form__label">
            Via
        </div>
        <input type="text" value="{{ old('via') }}" class="form__input @if ($errors->has('via')) form__input-invalid @endif" id="route" name="via"  type="text" placeholder="Inserisci la tua via">
    </div>
    <div class="form__group">
        <div class="row">
            <div class="col-1-of-2">
                <div class="form__label">
                    Civico
                </div>
                <input type="text" value="{{ old('street_number') }}" id="street_number" class="form__input @if ($errors->has('civico')) form__input-invalid @endif" name="civico" placeholder="Inserisci il tuo civico">
            </div>
            <div class="col-1-of-2">
                <div class="form__label">
                    Cap
                </div>
                <input type="text" value="{{ old('civico') }}" id="postal_code" class="form__input @if ($errors->has('cap')) form__input-invalid @endif" name="cap" placeholder="Inserisci il tuo cap">
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="row">
            <div class="col-1-of-2">
                <div class="form__label">
                    Comune
                </div>
                <input type="text" value="{{ old('comune') }}" class="form__input @if ($errors->has('comune')) form__input-invalid @endif" id="locality" name="comune" placeholder="Inserisci il tuo comune">
            </div>
            <div class="col-1-of-2">
                <div class="form__label">
                    Provincia
                </div>
                <input type="text" value="{{ old('provincia') }}" class="form__input @if ($errors->has('provincia')) form__input-invalid @endif" id="administrative_area_level_2" name="provincia" placeholder="Inserisci la tua Provincia">
            </div>
        </div>
    </div>
    <!-- \ -->
    <div class="form__group">
        <div class="form__label">
            Email
        </div>
        <input type="text" value="{{ old('email') }}" class="form__input @if ($errors->has('email')) form__input-invalid @endif" name="email" placeholder="Inserisci la tua email">
    </div>
    <div class="form__group">
        <div class="form__label">
            Importo
            <i class="fas fa-euro-sign"></i>
        </div>
        <input type="number" value="{{ old('amount') }}" class="form__input @if ($errors->has('amount')) form__input-invalid @endif" name="amount" placeholder="Quanto vuoi donare?">
    </div>
    <div class="form__group">
        <div class="form__label">
        <input type="checkbox" name="dcheck" id="dcheck"  @if(old('dcheck')== "on") {{ 'checked' }}@endif/>
        <p>Donazione in memoria</p>
        </div>
    </div>
    <div class="form__group">
        <div class="row" id="dim">
            <div class="col-1-of-2">
                <div class="form__label">
                    Nome defunto
                </div>
                <input type="text" value="{{ old('dname') }}" class="form__input @if ($errors->has('dname')) form__input-invalid @endif" name="dname" placeholder="Inserisci il nome del defunto">
            </div>
            <div class="col-1-of-2">
                <div class="form__label">
                    Cognome defunto
                </div>
                <input type="text" value="{{ old('dsurname') }}" class="form__input @if ($errors->has('dsurname')) form__input-invalid @endif" name="dsurname" placeholder="Inserisci il cognome del defunto">
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__label u-margin-bottom-small">
            Termini e condizioni
        </div>
        <div class="form__checkprivacy">
            <input type="checkbox" name="privacy" >
        </div>
        <div class="form__privacy">
            Acconsento al trattamento dei miei dati personali secondo quanto scritto nella <a href="#myModal" data-toggle="modal">privacy policy</a> di airpp.it
        </div>
    </div>
    <div class="form__group">
        <div class="form__label u-margin-bottom-small" style="padding-top: 2rem;">
            Metodi di pagamento  
        </div>
        <div class="row" style="padding: 1rem;">
            <style>
                .pay_img{ width: 7rem;}
            </style>
            <div class="col-1-of-4"><img class="pay_img" src="{{asset('/media/pay_icons/paypal.png')}}" alt=""></i></div>
            <div class="col-1-of-4"><img class="pay_img" src="{{asset('/media/pay_icons/visa.png')}}" alt=""></i></div>
            <div class="col-1-of-4"><img class="pay_img" src="{{asset('/media/pay_icons/mastercard.png')}}" alt=""></i></div>
            <div class="col-1-of-4"><img class="pay_img" src="{{asset('/media/pay_icons/postepay.png')}}" alt=""></i></div>
        </div>
    </div>
    <div class="form__group u-center-text">
        @include('includes.captcha')
    </div>
    @if ($errors->any())
        <div class="form__invalid form__group small u-margin-top-medium">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form__group u-center-text u-margin-top-medium">
        <button class="btn btn__primary btn__big u-display-inline-block">
            Dona
        </button>
    </div>
</form>
<script>
    $( document ).ready(function() {
        if(document.getElementById("dcheck").checked){
            $("#dim").css('display', 'block');
        }else{
            $("#dim").css('display', 'none');
        }
    });
    $("#dcheck").change(function() {
        $("#dim").slideToggle();
    });
</script>