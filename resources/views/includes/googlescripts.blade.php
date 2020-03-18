<script>
    var placeSearch, autocomplete;

    var componentForm = {
        locality: 'long_name',
        postal_code: 'short_name',
        street_number: 'short_name',
        route: 'long_name',
        administrative_area_level_2: 'long_name'
    };

    function initAutocomplete() {

    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocomplete'), {types: ['geocode']});
    autocomplete.setFields(['address_component']);
    autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
        }
    }
    }
    function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        var circle = new google.maps.Circle(
            {center: geolocation, radius: position.coords.accuracy});
        autocomplete.setBounds(circle.getBounds());
        });
    }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GMAPS_KEY')}}&libraries=places&callback=initAutocomplete" async defer></script>
