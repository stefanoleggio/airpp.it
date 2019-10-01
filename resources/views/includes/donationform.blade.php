<form method="POST" class="form u-padding-normal u-display-inline-block" action="{!! URL::to('donationspaypal') !!}">
    {{ csrf_field() }}
    <div class="form__group">
        <div class="row">
            <div class="col-1-of-2">
                <div class="form__label">
                    Nome
                </div>
                <input type="text" value="{{ old('name') }}" class="form__input @error('name') form__input-invalid @enderror" name="name" placeholder="Inserisci il tuo nome">
            </div>
            <div class="col-1-of-2">
                <div class="form__label">
                    Cognome
                </div>
                <input type="text" value="{{ old('surname') }}" class="form__input @error('surname') form__input-invalid @enderror" name="surname" placeholder="Inserisci il tuo cognome">
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__label">
            Codice fiscale
        </div>
        <input type="text" value="{{ old('cf') }}" class="form__input @error('cf') form__input-invalid @enderror" name="cf" placeholder="Inserisci il tuo codice fiscale">
    </div>
    <div class="form__group">
        <div class="form__label">
            Via e civico
        </div>
        <input type="text" value="{{ old('via') }}" class="form__input @error('via') form__input-invalid @enderror" id="autocomplete" onFocus="geolocate()" name="via" onFocus="geolocate()" type="text" placeholder="Inserisci la tua via">
    </div>
    <div class="form__group">
        <div class="row">
            <div class="col-1-of-2">
                <div class="form__label">
                    Cap
                </div>
                <input type="text" disabled="true" value="{{ old('cap') }}" id="postal_code" class="form__input @error('cap') form__input-invalid @enderror" name="cap" placeholder="Inserisci il tuo cap">
            </div>
            <div class="col-1-of-2">
                <div class="form__label">
                    Comune
                </div>
                <input type="text" disabled="true" value="{{ old('comune') }}" class="form__input @error('comune') form__input-invalid @enderror" id="locality" name="comune" placeholder="Inserisci il tuo comune">
            </div>
        </div>
    </div>
    <div class="form__group">
        <div class="form__label">
            Email
        </div>
        <input type="text" value="{{ old('email') }}" class="form__input @error('email') form__input-invalid @enderror" name="email" placeholder="Inserisci la tua email">
    </div>
    <div class="form__group">
        <div class="form__label">
            Importo
            <i class="fas fa-euro-sign"></i>
        </div>
        <input type="number" value="{{ old('amount') }}" class="form__input @error('amount') form__input-invalid @enderror" name="amount" placeholder="Quanto vuoi donare?">
    </div>
    <div class="form__group">
        <div class="form__label u-margin-bottom-small">
            Termini e condizioni
        </div>
        <div class="form__checkprivacy">
            <input type="checkbox" name="privacy">
        </div>
        <div class="form__privacy">
            Acconsento al trattamento dei miei dati personali secondo quanto scritto nella <a href="#myModal" data-toggle="modal">privacy policy</a> di airpp.it
        </div>
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
        <button class="btn btn__blue btn__big u-display-inline-block">
            Dona
        </button>
    </div>
</form>