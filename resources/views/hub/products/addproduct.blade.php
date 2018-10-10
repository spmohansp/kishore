@extends('hub.layoutMobile.master')


@section('product')
    is-active
@endsection

@section('addorder')
    is-active
@endsection

@section('header')
    Add Order
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')

    <form action="{{ route('hub.addproduct') }}" method="POST">
        {{ csrf_field() }}
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="form-control" id="input1" value="{{ old("parcelname") }}" placeholder="Enter your parcelname" name="parcelname" required type="text" >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input2">Dimensions</label>
                        <input class="form-control" id="input2" value="{{ old("dimensions") }}" placeholder="Enter your dimensions" name="dimensions" onkeypress="return  isNumberKey(event)"  required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input3">Parcel Weight</label>
                        <select class="form-control" name="parcelweight" onkeypress="return  isNumberKey(event)"  required >
                            <option value="">Select Parcel Weight</option>
                            <option value="under_1_kg" <?php if( old("parcelweight")=='under_1_kg'){ echo "selected";} ?>>under 1 KG</option>
                            <option value="2-5_kg" <?php if( old("parcelweight")=='2-5_kg'){ echo "selected";} ?>>2-5 KG</option>
                            <option value="6-10_kg" <?php if( old("parcelweight")=='6-10_kg'){ echo "selected";} ?>>6-10 KG</option>
                            <option value="11-15_kg" <?php if( old("parcelweight")=='11-15_kg'){ echo "selected";} ?>>11-15 KG</option>
                            <option value="over_15_kg" <?php if( old("parcelweight")=='over_15_kg'){ echo "selected";} ?>>over 15 KG</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup Date</label>
                        <input class="form-control" id="datepicker" value="{{ old("pickupdate") }}" placeholder="Enter pickupdate" name="pickupdate" onkeypress="return  isNumberKey(event)"  required >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup Address </label>
                        <input class="form-control" id="pickupaddress" value="{{ old("pickupaddress") }}"  type="text" placeholder="Enter your pickupaddresss"  name="pickupaddress"  required >
                         <input class="form-control" id="pickupaddresslatitude" value="{{ old("pickupaddresslatitude") }}" type="hidden" name="pickupaddresslatitude"  required >
                         <input class="form-control" id="pickupaddresslongitude" value="{{ old("pickupaddresslongitude") }}" type="hidden" name="pickupaddresslongitude"  required >

                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Dropoff Address</label>
                        <input class="form-control" id="dropoffaddress" value="{{ old("dropoffaddress") }}" placeholder="Enter your dropoffaddress"  name="dropoffaddress"   required type="text">
                         <input class="form-control" id="dropoffaddresslatitude" value="{{ old("dropoffaddresslatitude") }}" type="hidden" name="dropoffaddresslatitude"  required >
                         <input class="form-control" id="dropoffaddresslongitude" value="{{ old("dropoffaddresslongitude") }}" type="hidden" name="dropoffaddresslongitude"  required >
                    </div>
                </div>


                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Dropoff Contact Name</label>
                        <input class="form-control" id="dropoffContactName" value="{{ old("dropoffContactName") }}" placeholder="Enter your Dropoff Contact Name"  name="dropoffContactName"   required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Dropoff Contact Number</label>
                        <input class="form-control" id="dropoffContactNumber" value="{{ old("dropoffContactNumber") }}"  placeholder="Enter your Dropoff Contact Number"  name="dropoffContactNumber" required type="number">
                    </div>
                </div>

                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup Start Time</label>
                        <input class="form-control timepicker" value="{{ old("pickupStartTime") }}" id="input4" placeholder="Enter pickuptime" name="pickupStartTime" onkeypress="return  isNumberKey(event)"  required>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup End Time</label>
                        <input class="form-control timepicker" value="{{ old("pickupEndTime") }}" id="input4" placeholder="Enter pickuptime" name="pickupEndTime" onkeypress="return  isNumberKey(event)"  required>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">DropOff Start Time</label>
                        <input class="form-control timepicker" value="{{ old("dropOffStartTime") }}" id="input4" placeholder="Enter pickuptime" name="dropOffStartTime" onkeypress="return  isNumberKey(event)"  required>
                    </div>
                </div>
                                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">DropOff End Time</label>
                        <input class="form-control timepicker" value="{{ old("dropOffEndTime") }}" id="input4" placeholder="Enter pickuptime" name="dropOffEndTime" onkeypress="return  isNumberKey(event)"  required>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Price</label>
                        <input class="form-control" id="input4" value="{{ old("price") }}" placeholder="Enter price" name="price" required>
                    </div>
                </div>
            </div>
            <div  style="text-align: center">
                <button class="btn btn-success btn-small" type="submit">Save</button>&emsp;&emsp;&emsp;&emsp;
                <button class="btn btn-warning btn-small" type="reset">Cancel</button>
            </div>
        </div>
    </form>
@endsection


@section('script')
    <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker").datepicker({
                minDate: 0
            });
        } );
    </script>

    <script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                defaultTime: '00',
            });
        });
    </script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&libraries=places&language=en-AU"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIun_91OJDETSmXfb2EYqMcRg966ls6dw&callback=initMap"
   async defer></script> -->
<script>
    var autocomplete = new google.maps.places.Autocomplete($("#pickupaddress")[0], {});
    var autocomplete1 = new google.maps.places.Autocomplete($("#dropoffaddress")[0], {});
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        // console.log(place);
            var lat = $('#pickupaddresslatitude').val(place.geometry.location.lat());
            var lng = $('#pickupaddresslongitude').val(place.geometry.location.lng());
            console.log(place.geometry.location.lat());
    });
    google.maps.event.addListener(autocomplete1, 'place_changed', function() {
        var place1 = autocomplete1.getPlace();
        // console.log(place.address_components);
            var lat = $('#dropoffaddresslatitude').val(place1.geometry.location.lat());
            var lng = $('#dropoffaddresslongitude').val(place1.geometry.location.lng());
    });
</script>
@endsection
