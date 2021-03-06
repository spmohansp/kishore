@extends('commutter.layout.master')

@section('receiver')
    is-active
@endsection

@section('addreceiver')
    is-active
@endsection

@section('header')
    Add Receiver
@endsection

@section('content')
    <form action="{{ route('commutter.addreceiver') }}" method="POST">
        {{ csrf_field() }}
        <h3>Add Receiver Details</h3>
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input1">Receiver Name</label>
                        <input class="c-input" id="input1"  name="receivername" required type="text" >
                    </div>
                </div><br> <br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input2">Receiver's phone</label>
                        <input class="c-input" id="input2"  name="receiverphone"  onkeypress="return  isNumberKey(event)" maxlength="10"  required type="text">
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Receiver's Email Address </label>
                        <input class="c-input" id="input4"  type="text"  name="email"  required >
                    </div>
                </div><br><br>

            <div  style="text-align: center">
                <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Add</button>&emsp;&emsp;&emsp;&emsp;
                <button class="c-btn c-btn--success u-mb-xsmall" type="reset">Cancel</button>
            </div>
        </div>
        <div>
            <a class="c-btn c-btn--info u-mb-xsmall" style="position:absolute;top:80px;right:170px" onclick="goBack()">Go back</a>
        </div>
    </form>

@endsection


@section('script')
<script>
    function goBack() {
        window.history.back();
    }


    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

@endsection
