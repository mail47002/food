@push('styles')
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
        max-width: 670px;
        margin: 0 auto;
      }

      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #inputAddress {
        background-color: #fff;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
        margin: 0 auto;
      }

      #inputAddress:focus {
        border-color: #4d90fe;
      }
    </style>
@endpush


@push('scripts')
<script>

  var address = '';
  var input = document.getElementById('inputAddress');
  var fieldForAddress = document.getElementById('address');
  var mapContainer = document.getElementById('map');

  function initMap() {
    var map = new google.maps.Map(mapContainer, {
      center: {lat: 50.4450846, lng: 30.5239226},
      zoom: 13
    });

    var geocoder = new google.maps.Geocoder();

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
      map: map,
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
        map.setZoom(23);  // Zoom when found place.
      }
      marker.setIcon(/** @type {google.maps.Icon} */({
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(35, 35)
      }));
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);


      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

      infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      infowindow.open(map, marker);

      fieldForAddress.value = (address);
    });


// click on map

    google.maps.event.addListener(map, 'click', function(event) {
      geocoder.geocode({
        'latLng': event.latLng
      }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            //console.dir(results[0].geometry.location);

            address = results[0].formatted_address;
            infowindow.close();
            infowindow.setContent(address);
            marker.setPosition(results[0].geometry.location);
            infowindow.open(map, marker);

            fieldForAddress.value = (address);
          }
        }
      });
    });
  }




</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnxGiPdH3lTiOVu98kJxvn3h8Oezlw3w4&libraries=places&callback=initMap"
        async defer></script>


@endpush