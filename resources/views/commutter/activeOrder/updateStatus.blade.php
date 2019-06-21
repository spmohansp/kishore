@extends('commutter.layoutMobile.master')

@section('Orders')
    is-active
@endsection

@section('ActiveOrder')
    is-active
@endsection

@section('header')
    Update Status
@endsection


@section('content')
    <form action="{{ route('commutter.updateProdtctStatus',$products->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="form-control" id="input1" value="{{$products->parcelname}}" readonly="" type="text" >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input2">Pickup Address</label>
                        <input class="form-control" id="input2" value="{{$products->pickupaddress}}" type="text" readonly="">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Drop off Address</label>
                        <input class="form-control" id="input4" value="{{$products->dropoffaddress}}" type="text" readonly="">
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input4">Status</label>
                        @if($products->status!='completed')
                        <select class="form-control" name="status">
                        	<!-- <option value="">Select Status</option> -->
                        	@if($products->status!='In_Transmit' && $products->status!='completed')
                        	<option value="In_Transmit">In Transmit</option>
                        	@endif()
                        	@if($products->status=='In_Transmit')
                        	<option value="completed">Completed</option>
                        	@endif()
                        </select >
                		@else
                			<p>Products Delevered Successfully!</p>
                		@endif()

                    </div>
                </div>
			@if($products->status!='completed')
	            <div class="col-lg-12 u-mb-xsmall" style="text-align: center">
	                <button class="btn btn-success btn-sm" type="submit">Update Status</button>
	            </div>
	        @endif()
	        </div>
        <div>
            <!-- <a class="c-btn c-btn--info u-mb-xsmall" style="position:absolute;top:80px;right:170px" onclick="goBack()">Go back</a> -->
        </div>
    </form>
@endsection