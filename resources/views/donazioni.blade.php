@extends('templates.page')
@section('content')
    @if ($message = Session::get('success'))
        @include('includes.msg', 
            [
                'type' => 'success',
                'txt' => $message
            ])
        <?php Session::forget('success');?>
    @endif
    @if ($message = Session::get('error'))
        @include('includes.msg', 
            [
                'type' => 'error',
                'txt' => $message
            ])
        <?php Session::forget('error');?>
    @endif
    @foreach($banners as $banner)
        @include('includes.banner', 
        [
            'title' => $banner->title,
            'description' => $banner->description,
            'img' => $banner->img
        ])
    @endforeach
    <section class="u-bgcolor-color-grey u-container-fullwidth">
        <div class="row u-padding-normal ">
            <div class="col-1-of-2 u-center-text">
                <div class="heading-secondary u-margin-bottom-medium u-color-secondary">
                    Donazioni online
                </div>
                <div class="paragraph">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam atque rem excepturi, est veritatis esse vel, velit nostrum magni voluptatum et! Inventore molestias aspernatur repellat aut eos id vel laborum.
                </div>
                @include('includes.msg', 
                [
                    'type' => 'info',
                    'txt' => $msgs[0]->title,
                    'desc' => $msgs[0]->content
                ])
            </div>
            <div class="col-1-of-2 u-center-text">
                <form method="POST" class="form u-padding-normal u-display-inline-block" action="{!! URL::to('paypal') !!}">
                    {{ csrf_field() }}
                    <div class="form__group">
                        <div class="form__label">
                            Nome
                        </div>
                        <input type="text" value="{{ old('name') }}" class="form__input @error('name') form__input-invalid @enderror" name="name" placeholder="inserisci il tuo nome">
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Cognome
                        </div>
                        <input type="text" value="{{ old('surname') }}" class="form__input @error('surname') form__input-invalid @enderror" name="surname" placeholder="inserisci il tuo cognome">
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
                    @if ($errors->any())
                        <div class="form__invalid form__group small">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form__group u-center-text">
                        <button class="btn btn__blue u-display-inline-block">
                            Dona
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="row u-padding-normal">
    @foreach($datas as $data)
        <div class="col-1-of-2 u-center-text">
            <div class="heading-secondary u-margin-bottom-medium u-color-secondary">
                {{ $data->title }}
            </div>
            <div class="paragraph">
                {{ $data->content }}
            </div>
        </div>
    @endforeach
    </div>
@endsection