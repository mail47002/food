@push('styles')
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
        max-width: 670px;
        margin: 0 auto;
      }
    </style>
@endpush


@push('scripts')
<script>

  @if(auth()->user()->profile)
    var place = {lat: {{ auth()->user()->profile->lat }}, lng: {{ auth()->user()->profile->lng }}}; /*Сюда вставлять с БД сохраненные координаты*/
  @else
    var place = {lat: 50.4450846, lng: 30.5239226};
  @endif
  var address = '';
  var input = document.getElementById('address');
  var mapContainer = document.getElementById('map');
  var lat = document.getElementById('lat');
  var lng = document.getElementById('lng');
  // var button = document.getElementById('correct');

  function initMap() {
    var map = new google.maps.Map(mapContainer, {
      center: place,
      zoom: 15
    });

    var geocoder = new google.maps.Geocoder();

    // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(button);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
      @if(auth()->user()->profile)
        position: {lat: {{ auth()->user()->profile->lat }}, lng: {{ auth()->user()->profile->lng }}},
      @endif
      map: map,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(19);  // Zoom when found place.
      }
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);


      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

      infowindow.setContent(address);
      infowindow.open(map, marker);

      input.value = address;
      lat.value = place.geometry.location.lat();
      lng.value = place.geometry.location.lng();
    });


// click on map OR drag marker
    map.addListener('click', handleEvent);
    marker.addListener('drag', handleEvent);
    marker.addListener('dragend', handleEvent);

    function handleEvent(event) {
      geocoder.geocode({
        'latLng': event.latLng
      }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (place = results[0]) {
            // console.dir(place);

            address = place.formatted_address;
            infowindow.close();
            infowindow.setContent(address);
            marker.setPosition(place.geometry.location);
            infowindow.open(map, marker);

            input.value = address;
            lat.value = place.geometry.location.lat();
            lng.value = place.geometry.location.lng();
          }
        }
      });
    };




  }




</script>
/*Сюда вставить ключ google map*/
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnxGiPdH3lTiOVu98kJxvn3h8Oezlw3w4&libraries=places&callback=initMap"
        async defer></script>


@endpush