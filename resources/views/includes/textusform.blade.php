<form method="POST" class="form u-padding-normal u-display-inline-block" action="/textus">
{{ csrf_field() }}
    <div class="form__group">
        <div class="row">
            <div class="col-1-of-2">
                <div class="form__label">
                    Nome
                </div>
                <input type="text" value="{{ old('name') }}" class="form__input @if ($errors->has('name')) form__input-invalid @endif" name="name" placeholder="Inserisci il tuo nome">            </div>
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
            Email
        </div>
        <input type="text" value="{{ old('email') }}" class="form__input @error('email') form__input-invalid @enderror" name="email" placeholder="Inserisci la tua email">
    </div>
    <div class="form__group">
        <div class="form__label">
            Messaggio
        </div>
        <pre><textarea class="form__input @error('msg') form__input-invalid @enderror" name="msg" placeholder="Inserisci il tuo messaggio">{{ old('msg') }}</textarea></pre>
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
        <button class="btn btn__primary btn__big u-display-inline-block">
            Invia
        </button>
    </div>
</form>