@extends('commutter.layout.master')

@section('receiver')
    is-active
@endsection

@section('addreceiver')
    is-active
@endsection

@section('header')
    Map
@endsection

@section('content')
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&sensor=true&libraries=places" type="text/javascript"></script>
<p>Map</p>
 <div id="map" style="width: 100%; height: 400px;"></div>

@endsection


@section('script')
  <script type="text/javascript">
    var locations = [
    <?php
    foreach ($products as $key => $value) {
            if ($key != 0) {
              echo ",";
            }
            echo "['".$value->parcelname.' - '.$value->dropoffaddress."',".$value->dropoffaddresslatitude.",".$value->dropoffaddresslongitude."]";
          }
     ?>];

  // 	  	navigator.geolocation.getCurrentPosition(showPosition);
		// function showPosition(position) {
		//     var latlon = position.coords.latitude + "," + position.coords.longitude;
		// }

		    // var map = new google.maps.Map(document.getElementById('map'), {
		    //   zoom: 14,
		    //   center: new google.maps.LatLng(12.203622399999999,78.548992),
		    //   mapTypeId: google.maps.MapTypeId.ROADMAP
		    // });
		    // var infowindow = new google.maps.InfoWindow();

		    // var marker, i;

		    // for (i = 0; i < locations.length; i++) {  
		    //   marker = new google.maps.Marker({
		    //     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		    //     map: map
		    //   });

		    //   google.maps.event.addListener(marker, 'click', (function(marker, i) {
		    //     return function() {
		    //       infowindow.setContent(locations[i][0]);
		    //       infowindow.open(map, marker);
		    //     }
		    //   })(marker, i));
		    // }

		if(navigator.geolocation) {
		   navigator.geolocation.getCurrentPosition(showLocation, options);
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
		        map: map
		      });

		      google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        return function() {
		          infowindow.setContent(locations[i][0]);
		          infowindow.open(map, marker);
		        }
		      })(marker, i));
		    }
         }
			
      </script>

@endsection
