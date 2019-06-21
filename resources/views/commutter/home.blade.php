@extends('commutter.layoutMobile.master')

@section('header')
   Dashboard
@endsection

@section('dashboard')
   is-active
@endsection


@section('activeButton')
	@if(Auth()->user()->status==0)
		<?php $status = 1;
		$button = 'To Active';
		$btn = 'success';
		 ?>
	@else
		<?php $status = 0;
		$button = 'To In Active';
		$btn = 'danger';
		 ?>
	@endif

	<form action="{{route('commutter.updateCommutterStatus')}}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="status" value="{{$status}}">
		<button class="btn btn-{{$btn}} btn-small pull-right">{{$button}}</button>
	</form>

@endsection

@section('content')
<!-- Active And Inactive Button -->
	@if(Auth()->user()->status==0)
		<?php $status = 1;
		$button = 'To Active';
		$btn = 'success';
		 ?>
	@else
		<?php $status = 0;
		$button = 'To In Active';
		$btn = 'danger';
		 ?>
	@endif


	<form action="{{route('commutter.updateCommutterStatus')}}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="status" value="{{$status}}">
		<button class="btn btn-{{$btn}} btn-small pull-right">{{$button}}</button>
	</form>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&sensor=true&libraries=places" type="text/javascript"></script>
 <div id="map" style="width: 100%; height: 400px;"></div>

    <input type="hidden" name="" id="latidude">
   <input type="hidden" name="" id="longitude">
@endsection


@section('script')
  <script type="text/javascript">
    var locations = [<?php
    	$i=0;
 	foreach (App\product::get() as $key => $value) {
        if ($value->status=='open') {
	        if ($i != 0) {
	          echo ",";
	        }$i++;
        	echo "['".$value->pickupaddress."',".$value->pickupaddresslatitude.",".$value->pickupaddresslongitude."]";
   		}
  	} 
		?>];
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



		$(document).ready(function () {
		    setTimeout(function(){
		   		// $('#getData').on('click',function (e) {
					// e.preventDefault();
		     			var latidude = $('#latidude').val();
		     			var longitude = $('#longitude').val();
					    $.ajax({
							type : "get",
							url:'/commutter/updateCommutterLocation',
							data:{latidude:latidude,longitude:longitude},
							success:function(data){
								// console.log(data);
							}
						});
					// });
		   },2000); 
		})

			
    </script>
    @endsection
