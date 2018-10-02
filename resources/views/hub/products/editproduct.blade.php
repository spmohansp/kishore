@extends('hub.layout.master')

@section('product')
    is-active
@endsection

@section('viewproduct')
    is-active
@endsection

@section('header')
    Edit product
@endsection

@section('content')
    <form action="{{ route('hub.updateproduct',$product->id) }}" method="POST">
        {{ csrf_field() }}
        <h3>Edit Parcel Details</h3>
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="c-input" id="input1" placeholder="Enter your parcelname" name="parcelname" value = "{{ $product -> parcelname }}"  required type="text" >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input2">Dimensions</label>
                        <input class="c-input" id="input2" placeholder="Enter your dimensions" name="dimensions" value = "{{ $product -> dimensions }}" onkeypress="return  isNumberKey(event)"  required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
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
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Address </label>
                        <input class="c-input" id="pickupaddresss"  type="text" placeholder="Enter your pickupaddresss"  name="pickupaddresss" value = "{{ $product -> pickupaddresss }}" required >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Dropoff Address</label>
                        <input class="c-input" id="dropoffaddress" placeholder="Enter your dropoffaddress"  name="dropoffaddress"  value = "{{ $product -> dropoffaddress }}" required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Date</label>
                        <input class="c-input" id="datepicker" placeholder="Enter Pickupdate" name="pickupdate" value = "{{ $product -> pickupdate }}"onkeypress="return  isNumberKey(event)"  required type="text">
                    </div>

                </div>
                <br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Time</label>
                        <input class="c-input timepicker" id="input4" placeholder="Enter pickuptime" name="pickuptime" value = "{{ $product -> pickuptime }}" onkeypress="return  isNumberKey(event)"   required type="text">
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
        $( "#datepicker" ).datepicker();
    } );
</script>

<script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 50,

        });
    });
</script>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&libraries=places&language=en-AU"></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&sensor=true&libraries=places" type="text/javascript"></script> -->
<script>
    var autocomplete = new google.maps.places.Autocomplete($("#pickupaddresss")[0], {});
    var autocomplete1 = new google.maps.places.Autocomplete($("#dropoffaddress")[0], {});
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        // console.log(place.address_components);
    });
    google.maps.event.addListener(autocomplete1, 'place_changed', function() {
        var place = autocomplete1.getPlace();
        // console.log(place.address_components);
    });
</script>


@endsection