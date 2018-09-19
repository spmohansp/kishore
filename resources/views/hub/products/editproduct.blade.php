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
    <form action="{{ route('hub.addproduct') }}" method="POST">
        {{ csrf_field() }}

        <h3>Add Parcel Details</h3>
        
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="c-input" id="input1" placeholder="Enter your parcelname" name="parcelname" value = "{{ $addproduct -> parcelname }}"  required type="text" >
                    </div>
                </div><br> <br>                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input2">Dimensions</label>
                        <input class="c-input" id="input2" placeholder="Enter your dimensions" name="dimensions" value = "{{ $addproduct -> dimensions }}" required type="text">
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input3">Parcel Weight</label>
                        <select class="c-select__input" name="parcelweight" value = "{{ $addproduct -> parcelweight }}">
                            <option value="volvo">under 1 kg</option>
                            <option value="saab">5 kg</option>
                            <option value="opel">10 kg</option>
                            <option value="audi">15 kg</option>
                        </select>
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Address </label>
                        <input class="c-input" id="input4"  type="text" placeholder="Enter your pickupaddresss"  name="pickupaddresss" value = "{{ $addproduct -> pickupaddresss }}" required >
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Dropoff Address</label>
                        <input class="c-input" id="input4" placeholder="Enter your dropoffaddress"  name="dropoffaddress"  value = "{{ $addproduct -> dropoffaddress }}" required type="text">
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Date</label>
                        <input class="c-input" id="input4" placeholder="Enter Pickupdate" name="pickupdate" value = "{{ $addproduct -> pickupdate }}"required type="text">
                    </div>

                </div>
                <br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Time</label>
                        <input class="c-input" id="input4" placeholder="Enter animal pickuptime" name="pickuptime" value = "{{ $addproduct -> pickuptime }}"required type="text">
                    </div>

               
            </div>
        </div>

<div  style="text-align: center">
            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Next</button>&emsp;&emsp;&emsp;&emsp;
        
            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Cancel</button>
        
</div>



@endsection

