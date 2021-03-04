@extends('templates.page')
@section('content')
@include('includes.sessionmsg')
    @foreach($banners as $banner)
        @include('includes.banner', 
        [
            'title' => $banner->title,
            'description' => $banner->description,
            'img' => $banner->img
        ])
    @endforeach
    <div class="u-padding-normal-unique">
    </div>
    <div class="u-center-text u-bgcolor-color-grey u-margin-bottom-big">

    <form method="POST" class="form u-padding-normal u-display-inline-block" action="{!! URL::to('rinnovoPayment') !!}">
    {{ csrf_field() }}
    <div class="form__group">
        <div class="form__label">
            Codice fiscale
        </div>
        <input type="text" value="{{ old('cf') }}" class="form__input @if ($errors->has('cf')) form__input-invalid @endif" name="cf" placeholder="Inserisci il tuo codice fiscale">
    </div>
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
        <div class="form__label u-margin-bottom-small">
            Metodi di pagamento  
        </div>
        <style>
            .pay_img{ width: 7rem;}
        </style>
        <table style="margin-left: 2rem;">
            <tr>
                <td><img class="pay_img" src="{{asset('/media/pay_icons/paypal.png')}}" alt=""></i></td>
                <td><img class="pay_img" src="{{asset('/media/pay_icons/visa.png')}}" alt=""></i></td>
                <td><img class="pay_img" src="{{asset('/media/pay_icons/mastercard.png')}}" alt=""></i></td>
                <td><img class="pay_img" src="{{asset('/media/pay_icons/postepay.png')}}" alt=""></i></td>
            </tr>
        </table>
    </div>
    <div class="form__group u-center-text u-margin-top-small">
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
            Rinnova
        </button>
    </div>
</form>
    </div>
    @include('includes.privacymodal')
@endsection