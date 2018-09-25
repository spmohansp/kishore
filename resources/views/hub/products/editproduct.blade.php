@extends('hub.layout.master')
@section('products')
    is-active
@endsection

@section('addproduct')
    is-active
@endsection

@section('header')
    Add product
@endsection
@section('content')
    <form action="{{ route('hub.updateproduct',$product->id) }}" method="POST">
        {{ csrf_field() }}

        <h3>Add Parcel Details</h3>
        
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="c-input" id="input1" placeholder="Enter your parcelname" name="parcelname" value = "{{ $product -> parcelname }}"  required type="text" >
                    </div>
                </div><br> <br>                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input2">Dimensions</label>
                        <input class="c-input" id="input2" placeholder="Enter your dimensions" name="dimensions" value = "{{ $product -> dimensions }}" onkeypress="return  isNumberKey(event)"  required type="text">
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input3">Parcel Weight</label>
                        <select class="c-select__input" name="parcelweight" value = "{{ $product -> parcelweight }}" onkeypress="return  isNumberKey(event)"  required>
                            <option value="under 1 kg">under 1 kg</option>
                            <option value="2-5 kg">2-5 kg</option>
                            <option value="6-10 kg">6-10 kg</option>
                            <option value="11-15 kg">11-15 kg</option>
                            <option value="over 15 kg">over 15 kg</option>
                        </select>
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Address </label>
                        <input class="c-input" id="input4"  type="text" placeholder="Enter your pickupaddresss"  name="pickupaddresss" value = "{{ $product -> pickupaddresss }}" required >
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Dropoff Address</label>
                        <input class="c-input" id="input4" placeholder="Enter your dropoffaddress"  name="dropoffaddress"  value = "{{ $product -> dropoffaddress }}" required type="text">
                    </div>
                </div><br><br>
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
            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Next</button>&emsp;&emsp;&emsp;&emsp;
        
            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Cancel</button>
        
</div>



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


@endsection