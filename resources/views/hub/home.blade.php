@extends('hub.layoutMobile.master')

@section('header')
 	Dashboard
@endsection

@section('dashboard')
   is-active
@endsection

@section('content')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&sensor=true&libraries=places" type="text/javascript"></script>

 <div id="map" style="width: 100%; height: 400px;"></div>


   <input type="hidden" name="" id="latidude">
   <input type="hidden" name="" id="longitude">
@endsection



@section('script')
  <script type="text/javascript">

		if(navigator.geolocation) {
		   navigator.geolocation.watchPosition(showLocation);
		} else {
		   alert("Sorry,Something Went Wrong");
		}

         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById('latidude').value = latitude;
            document.getElementById('longitude').value = longitude;
        }



$(document).ready(function () {
    setTimeout(function(){
   		// $('#getData').on('click',function (e) {
			// e.preventDefault();
     			var latidude = $('#latidude').val();
     			var longitude = $('#longitude').val();
			    $.ajax({
					type : "get",
					url:'/hub/homeMap',
					data:{latidude:latidude,longitude:longitude},
					success:function(data){
						var locations=[];
						Object.keys(data).forEach(key => {
						 	locations.push([data[key].name,data[key].latidude,data[key].longitude]);
						});
						
				            var map = new google.maps.Map(document.getElementById('map'), {
						      zoom: 14,
						      center: new google.maps.LatLng(document.getElementById('latidude').value,document.getElementById('longitude').value),
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
				});
			// });
   },2000); 
  })

    </script>


@endsection


