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