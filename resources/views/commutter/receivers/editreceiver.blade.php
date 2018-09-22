@extends('commutter.layout.master')
@section('receivers')
    is-active
@endsection

@section('addreceiver')
    is-active
@endsection

@section('header')
    Add product
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
                        <input class="c-input" id="input1"  name="receivername" value = "{{ $receiver -> receivername }}" required type="text" >
                    </div>
                </div><br> <br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input2">Receiver's phone</label>
                        <input class="c-input" id="input2"  name="receiverphone" value = "{{ $receiver -> receiverphone }}" required type="text">
                    </div>
                </div><br><br>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="c-field">
                        <label class="c-field__label" for="input4">Receiver's Email Address </label>
                        <input class="c-input" id="input4"  type="text"  name="email" value = "{{ $receiver -> email }}" required >
                    </div>
                </div><br><br>


            </div>
        </div>

        <div  style="text-align: center">
            <button class="c-btn c-btn--success u-mb-xsmall" type="submit">Add</button>&emsp;&emsp;&emsp;&emsp;

            <button class="c-btn c-btn--success u-mb-xsmall" type="reset">Cancel</button>


            <div>
                <a class="c-btn c-btn--info u-mb-xsmall" style="position:absolute;top:50px;right:100px" onclick="goBack()">Go back</a>
            </div>


        </div>
    </form>


@endsection

@section('script')
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>


@endsection




