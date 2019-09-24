@extends('templates.page')
@section('content')
    @foreach($banners as $banner)
        @include('includes.banner', 
        [
            'title' => $banner->title,
            'description' => $banner->description,
            'img' => $banner->img
        ])
    @endforeach
    <section class="u-bgcolor-color-grey u-container-fullwidth">
        <div class="row u-padding-normal">
            <div class="col-1-of-2 u-center-text">
                 <div class="heading-secondary u-margin-bottom-medium u-color-secondary">
                 {{ $datas[0]->title }}
                </div>
                <div class="paragraph">
                {{ $datas[0]->description }}
                </div>
                @include('includes.msg', 
                        [
                            'type' => 'info',
                            'txt' => "Quota annua",
                            'desc' => "Per diventare socio ordinario è richiesta una quota annua di 15€"
                        ])
            </div>
            <div class="col-1-of-2 u-center-text">
                <form method="POST" class="form u-padding-normal u-display-inline-block" action="{!! URL::to('joinuspaypal') !!}">
                    {{ csrf_field() }}
                    <div class="form__group u-margin-top-medium">
                        <div class="form__label">
                            Nome*
                        </div>
                        <input type="text" value="{{ old('name') }}" class="form__input @error('name') form__input-invalid @enderror" name="name" placeholder="inserisci il tuo nome">
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Cognome*
                        </div>
                        <input type="text" value="{{ old('surname') }}" class="form__input @error('surname') form__input-invalid @enderror" name="surname" placeholder="inserisci il tuo cognome">
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Codice fiscale*
                        </div>
                        <input type="text" value="{{ old('cf') }}" class="form__input @error('cf') form__input-invalid @enderror" name="cf" placeholder="inserisci il tuo codice fiscale">
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Via e civico di residenza*
                        </div>
                        <input type="text" value="{{ old('via') }}" class="form__input @error('via') form__input-invalid @enderror" name="via" placeholder="Inserisci la tua via e civico">
                    </div>
                    <div class="form__group">
                        <div class="row">
                            <div class="col-1-of-3">
                                <div class="form__label">
                                    Regione*
                                </div>
                                <select class="form__select u-margin-top-small" name="regione" id="regione" onchange="province()">
                                    <option selected disabled id="0">Seleziona</option>
                                </select>
                            </div>
                            <div class="col-1-of-3">
                                <div class="form__label">
                                    Provincia*
                                </div>
                                <select class="form__select u-margin-top-small" name="provincia" id="provincia" onchange="comuni()">
                                    <option selected disabled id="0">Seleziona</option>
                                </select>
                            </div>
                            <div class="col-1-of-3">
                                <div class="form__label">
                                    Comune*
                                </div>
                                <select class="form__select u-margin-top-small" name="comune" id="comune">
                                    <option selected disabled id="0">Seleziona</option>
                                </select>
                            </div>
                        </div>  
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Email*
                        </div>
                        <input type="text" value="{{ old('email') }}" class="form__input @error('email') form__input-invalid @enderror" name="email" placeholder="Inserisci la tua email">
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Telefono fisso
                        </div>
                        <input type="text" value="{{ old('telefono') }}" class="form__input @error('telefono') form__input-invalid @enderror" name="telefono" placeholder="Inserisci il tuo telefono">
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Cellulare
                        </div>
                        <input type="text" value="{{ old('cellulare') }}" class="form__input @error('cellulare') form__input-invalid @enderror" name="cellulare" placeholder="Inserisci il tuo cellulare">
                    </div>
                    <div class="form__group">
                        <div class="form__label">
                            Importo*
                            <i class="fas fa-euro-sign"></i>
                        </div>
                        <input type="number" min="15" value="15" class="form__input @error('amount') form__input-invalid @enderror" name="amount" placeholder="Quanto vuoi donare?">
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
                    <div class="form__group u-center-text u-margin-top-medium">
                        <button class="btn btn__big btn__blue u-display-inline-block">
                            Dona
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="u-center-text u-padding-normal">
    <div class="heading-secondary u-margin-bottom-medium u-color-secondary">
            {{ $datas[1]->title }}
        </div>
        <div class="paragraph">
        {{ $datas[1]->description }}
        </div>
    </div>
    <script>
        jQuery.getJSON('json/regioni.json', function(data){
            var regione = document.getElementById('regione');
            for(var i = 0; i<data.length; i++){
                var option = document.createElement("option");
                option.text = data[i].nome;
                option.setAttribute('id', data[i].id);
                regione.add(option);
            }
        });

        function province(){
            var reg = document.getElementById('regione');
            var provincia = document.getElementById('provincia');
            var id = reg.options[reg.selectedIndex].getAttribute('id');
            for (i = provincia.length - 1; i >= 0; i--) {
                if(provincia.options[i].getAttribute('id') != "0"){
                    provincia.remove(i);
                }
            }
            var comune = document.getElementById('comune');
            for (i = comune.length - 1; i >= 0; i--) {
                if(comune.options[i].getAttribute('id') != "0"){
                    comune.remove(i);
                }
            }
            jQuery.getJSON('json/province.json', function(data){
                for(var i = 0; i<data.length; i++){
                    if(data[i].id_regione == id){
                        var option = document.createElement("option");
                        option.text = data[i].nome;
                        option.setAttribute('id', data[i].id);
                        provincia.add(option);
                    }
                }
            });
        }

        function comuni(){
            var prov = document.getElementById('provincia');
            var comune = document.getElementById('comune');
            var id = prov.options[prov.selectedIndex].getAttribute('id');
            for (i = comune.length - 1; i >= 0; i--) {
                if(comune.options[i].getAttribute('id') != "0"){
                    comune.remove(i);
                }
            }
            jQuery.getJSON('json/comuni.json', function(data){
                for(var i = 0; i<data.length; i++){
                    if(data[i].id_provincia == id){
                        var option = document.createElement("option");
                        option.text = data[i].nome;
                        option.setAttribute('id', data[i].id);
                        comune.add(option);
                    }
                }
            });
        }
    </script>
@endsection