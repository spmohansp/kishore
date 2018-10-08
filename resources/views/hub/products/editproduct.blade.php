@extends('hub.layoutMobile.master')

@section('product')
    is-active
@endsection

@section('viewproduct')
    is-active
@endsection

@section('header')
    Edit Product Details
@endsection

@section('content')
    <form action="{{ route('hub.updateproduct',$product->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="form-control" id="input1" placeholder="Enter your parcelname" name="parcelname" value = "{{ $product -> parcelname }}"  required type="text" >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input2">Dimensions</label>
                        <input class="form-control" id="input2" placeholder="Enter your dimensions" name="dimensions" value = "{{ $product -> dimensions }}" onkeypress="return  isNumberKey(event)"  required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input3">Parcel Weight</label>
                        <select class="c-select__input" name="parcelweight" value = "{{ $product -> parcelweight }}" onkeypress="return  isNumberKey(event)"  required>
                            <option value="">Select Parcel Weight</option>
                            <option value="under_1_kg" <?php if($product->parcelweight=='under_1_kg'){ echo "selected"; } ?>>under 1 KG</option>
                            <option value="2-5_kg" <?php if($product->parcelweight=='2-5_kg'){ echo "selected"; } ?>>2-5 KG</option>
                            <option value="6-10_kg" <?php if($product->parcelweight=='6-10_kg'){ echo "selected"; } ?>>6-10 KG</option>
                            <option value="11-15_kg" <?php if($product->parcelweight=='11-15_kg'){ echo "selected"; } ?>>11-15 KG</option>
                            <option value="over_15_kg" <?php if($product->parcelweight=='over_15_kg'){ echo "selected"; } ?>>over 15 KG</option>
                        </select>
                    </div>
                </div>
                   <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup Date</label>
                        <input class="form-control" id="datepicker" placeholder="Enter Pickupdate" name="pickupdate" value = "{{ $product -> pickupdate }}"onkeypress="return  isNumberKey(event)"  required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup Address </label>
                         <input class="form-control" id="pickupaddress"  type="text" value="{{ $product -> pickupaddress }}" placeholder="Enter your pickupaddresss"  name="pickupaddress"  required >
                         <input class="form-control" id="pickupaddresslatitude" type="hidden" value="{{ $product -> pickupaddresslatitude }}" name="pickupaddresslatitude"  required >
                         <input class="form-control" id="pickupaddresslongitude" type="hidden" value="{{ $product -> pickupaddresslongitude }}" name="pickupaddresslongitude"  required >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Dropoff Address</label>

                        <input class="form-control" id="dropoffaddress" placeholder="Enter your dropoffaddress"  name="dropoffaddress"  value = "{{ $product -> dropoffaddress }}"  required type="text">
                         <input class="form-control" id="dropoffaddresslatitude" type="hidden"  value="{{ $product -> dropoffaddresslatitude }}"  name="dropoffaddresslatitude"  required >
                         <input class="form-control" id="dropoffaddresslongitude" type="hidden" value="{{ $product -> dropoffaddresslongitude }}"  name="dropoffaddresslongitude"  required >
                    </div>
                </div>
             

                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Dropoff Contact Name</label>
                        <input class="form-control" id="dropoffContactName" placeholder="Enter your Dropoff Contact Name"  name="dropoffContactName" value = "{{ $product -> dropoffContactName }}" required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Dropoff Contact Number</label>
                        <input class="form-control" id="dropoffContactNumber" placeholder="Enter your Dropoff Contact Number"  name="dropoffContactNumber" value = "{{ $product -> dropoffContactNumber }}" required type="number">
                    </div>
                </div>



                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup Start Time</label>
                        <input class="form-control timepicker" id="input4" placeholder="Enter pickuptime" name="pickupStartTime" onkeypress="return  isNumberKey(event)" value = "{{ $product -> pickupStartTime }}" required>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Pickup End Time</label>
                        <input class="form-control timepicker" id="input4" placeholder="Enter pickuptime" name="pickupEndTime" onkeypress="return  isNumberKey(event)" value = "{{ $product -> pickupEndTime }}"  required>
                    </div>
                </div>
                                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">DropOff Start Time</label>
                        <input class="form-control timepicker" id="input4" placeholder="Enter pickuptime" name="dropOffStartTime" onkeypress="return  isNumberKey(event)" value = "{{ $product -> dropOffStartTime }}"  required>
                    </div>
                </div>
                                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">DropOff End Time</label>
                        <input class="form-control timepicker" id="input4" placeholder="Enter pickuptime" name="dropOffEndTime" onkeypress="return  isNumberKey(event)" value = "{{ $product -> dropOffEndTime }}"  required>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Price</label>
                        <input class="form-control" id="input4" placeholder="Enter price" value = "{{ $product -> price }}" name="price"   required>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Status</label>
                        <h3>{{ $product -> status }}</h3>
                    </div>
                </div>
            </div>
        <div  style="text-align: center">
            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Update</button>&emsp;&emsp;&emsp;&emsp;
        </div>
        </div>
    </form>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script type="text/javascript">
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $(function() {
        $( "#datepicker" ).datepicker({
            minDate: 0
        });
    });

    $(document).ready(function() {
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 50,

        });
    });
</script>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&libraries=places&language=en-AU"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIun_91OJDETSmXfb2EYqMcRg966ls6dw&callback=initMap"
   async defer></script> -->
<script>
    var autocomplete = new google.maps.places.Autocomplete($("#pickupaddress")[0], {});
    var autocomplete1 = new google.maps.places.Autocomplete($("#dropoffaddress")[0], {});
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        // console.log(place);
            // get lat
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