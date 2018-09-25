@extends('commutter.layout.master')

@section('receiver')
    is-active
@endsection

@section('viewreceiver')
    is-active
@endsection

@section('header')
    Edit Receiver
@endsection

@section('content')
    <form action="{{ route('commutter.updatereceiver',$receiver->id) }}" method="POST">
        {{ csrf_field() }}
        <h3>Edit Receiver Details</h3>
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input1">Receiver Name</label>
                        <input class="c-input" id="input1"  name="receivername" value = "{{ $receiver -> receivername }}" required type="text" >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input2">Receiver's phone</label>
                        <input class="c-input" id="input2"  name="receiverphone" value = "{{ $receiver -> receiverphone }}" onkeypress="return  isNumberKey(event)" maxlength="10" required type="text">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Receiver's Email Address </label>
                        <input class="c-input" id="input4"  type="text"  name="email" value = "{{ $receiver -> email }}" required >
                    </div>
                </div>
            </div>
            <div  style="text-align: center">
                <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Update</button>&emsp;&emsp;&emsp;&emsp;
                <button class="c-btn c-btn--success u-mb-xsmall" type="reset">Cancel</button>
                <div>
                    <a class="c-btn c-btn--info u-mb-xsmall" style="position:absolute;top:80px;right:170px" onclick="goBack()">Go back</a>
                </div>
            </div>
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




