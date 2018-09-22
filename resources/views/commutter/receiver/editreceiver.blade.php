@extends('commutter.layout.master')
@section('receiver')
    is-active
@endsection

@section('addreceiver')
    is-active
@endsection

@section('header')
    Add receiver
@endsection
@section('content')
    <form action="{{ route('commutter.addreceiver') }}" method="POST">
        {{ csrf_field() }}

        <h3>Add Receiver Details</h3>
        
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input1">Receiver's Name</label>
                        <input class="c-input" id="input1" placeholder="Enter your receivername" name="receivername" value = "{{ $receiver -> receivername }}"  required type="text" >
                    </div>
                </div><br> <br>                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input2">Receiver's phone</label>
                        <input class="c-input" id="input2" placeholder="Enter your dimensions" name="dimensions" value = "{{ $receiver -> dimensions }}" required type="text">
                    </div>
                </div><br><br>
               
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Pickup Address </label>
                        <input class="c-input" id="input4"  type="text" placeholder="Enter your emailaddresss"  name="email" value = "{{ $receiver -> email }}" required >
                    </div>
                </div><br><br>
             

               
            </div>
        </div>

<div  style="text-align: center">
            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Add</button>&emsp;&emsp;&emsp;&emsp;
        
            <button class="c-btn c-btn--success u-mb-xsmall" type="reset">Cancel</button>

            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">back</button>

        
</div>



@endsection

    