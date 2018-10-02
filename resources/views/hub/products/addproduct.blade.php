@extends('hub.layout.master')

@section('product')
    is-active
@endsection

@section('addorder')
    is-active
@endsection

@section('header')
    Add Order
@endsection

@section('content')
    <form action="{{ route('hub.addproduct') }}" method="POST">
        {{ csrf_field() }}
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="c-input" id="input1" placeholder="Enter your parcelname" name="parcelname" required type="text" >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="r-field">
                        <label class="c-field__label" for="input2">Dimensions</label>
                        <input class="c-input" id="input2" placeholder="Enter your dimensions" name="dimensions" onkeypress="return  isNumberKey(event)"  required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input3">Parcel Weight</label>
                        <select class="c-select__input" name="parcelweight" onkeypress="return  isNumberKey(event)"  required >
                            <option value="">Select Parcel Weight</option>
                            <option value="under_1_kg">under 1 KG</option>
                            <option value="2-5_kg">2-5 KG</option>
                            <option value="6-10_kg">6-10 KG</option>
                            <option value="11-15_kg">11-15 KG</option>
                            <option value="over_15_kg">over 15 KG</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Address </label>
                        <input class="c-input" id="pickupaddresss"  type="text" placeholder="Enter your pickupaddresss"  name="pickupaddresss"  required >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Dropoff Address</label>
                        <input class="c-input" id="dropoffaddress" placeholder="Enter your dropoffaddress"  name="dropoffaddress"   required type="text">
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Date</label>
                        <input class="c-input" id="datepicker" placeholder="Enter pickupdate" name="pickupdate"onkeypress="return  isNumberKey(event)"  required >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Time</label>
                        <input class="c-input timepicker" id="input4" placeholder="Enter pickuptime" name="pickuptime" onkeypress="return  isNumberKey(event)"  required>
                    </div>
                </div>
            </div>
            <div  style="text-align: center">
                <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Save</button>&emsp;&emsp;&emsp;&emsp;
                <button class="c-btn c-btn--warning u-mb-xsmall" type="reset">Cancel</button>
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
                interval: 60,
                defaultTime: '10',
            });
        });
    </script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&libraries=places&language=en-AU"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIun_91OJDETSmXfb2EYqMcRg966ls6dw&callback=initMap"
   async defer></script> -->
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