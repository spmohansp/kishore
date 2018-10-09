@extends('commutter.layoutMobile.master')

@section('Orders')
    is-active
@endsection

@section('LiveOrder')
    is-active
@endsection

@section('header')
    Live Orders
@endsection


@section('content')
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&sensor=true&libraries=places" type="text/javascript"></script>

   <input type="hidden" name="" id="latidude">
   <input type="hidden" name="" id="longitude">
   <!-- <button type="button" class="btn btn-success" id="getData">Load DATA</button> -->

   <div id="tableData"></div>

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
    // GET LATITUDE
  $(document).ready(function () {
    setTimeout(function(){
   		// $('#getData').on('click',function (e) {
			// e.preventDefault();
     			var latidude = $('#latidude').val();
     			var longitude = $('#longitude').val();
			    $.ajax({
					type : "get",
					url:'/commutter/getLiveData',
					data:{latidude:latidude,longitude:longitude},
					success:function(data){
						console.log(data);
						$('#tableData').html(data);
					}
				});
			// });
   },2000); 
  })

      </script>
@endsection
