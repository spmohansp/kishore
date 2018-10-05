@extends('commutter.layout.master')

@section('Orders')
    is-active
@endsection

@section('liveMap')
    is-active
@endsection

@section('header')
    Live Map
@endsection

@section('content')
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&sensor=true&libraries=places" type="text/javascript"></script>
<p>Map</p>
 <div id="map" style="width: 100%; height: 400px;"></div>

   <input type="hidden" id="start" value="{{$products->pickupaddress}}" name="">
    <input type="hidden" name="" value="{{$products->dropoffaddress}}" id="end">
@endsection


@section('script')
  <!-- <script type="text/javascript">
    var locations = [
    <?php
            echo "['".$products->parcelname.' - '.$products->pickupaddress."',".$products->pickupaddresslatitude.",".$products->pickupaddresslongitude."]";
            echo ",['".$products->parcelname.' - '.$products->dropoffContactName.' - '.$products->dropoffaddress."',".$products->dropoffaddresslatitude.",".$products->dropoffaddresslongitude."]";
     ?>
     ];

		if(navigator.geolocation) {
		   navigator.geolocation.watchPosition(showLocation);
		} else {
		   alert("Sorry,Something Went Wrong");
		}

         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            var map = new google.maps.Map(document.getElementById('map'), {
		      zoom: 14,
		      center: new google.maps.LatLng(latitude,longitude),
		      mapTypeId: google.maps.MapTypeId.ROADMAP
		    });
		    var infowindow = new google.maps.InfoWindow();

		    var marker, i;

		    for (i = 0; i < locations.length; i++) {  
		      marker = new google.maps.Marker({
		        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		        type: 'info',
		        map: map,
		      });

		      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        return function() {
		          infowindow.setContent(locations[i][0]);
		          infowindow.open(map, marker);
		        }
		      })(marker, i));
		    }
        }
      </script> -->
<script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: {{$products->pickupaddresslatitude}}, lng: {{$products->pickupaddresslongitude}}}
        });
        directionsDisplay.setMap(map);

        // var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        // };
        // document.getElementById('start').addEventListener('change', onChangeHandler);
        // document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&callback=initMap">
    </script>
@endsection
