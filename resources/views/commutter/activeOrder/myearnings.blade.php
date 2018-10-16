@extends('commutter.layoutMobile.master')

@section('Orders')
    is-active
@endsection

@section('earnings')
    is-active
@endsection

@section('header')
    My Earnings
@endsection


@section('content')


<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="c-table__head">
	                <tr class="c-table__row">
	                    <th class="c-table__cell c-table__cell--head">Date</th>
	                    <th class="c-table__cell c-table__cell--head">Pickup Address</th>
	                    <!-- <th class="c-table__cell c-table__cell--head">Drop Off Address</th> -->
	                    <th class="c-table__cell c-table__cell--head">Price</th>
	                </tr>
                </thead>
                <tbody>
                @foreach(Auth::user()->getMyEarnings as $orders)
                  @if($orders->status==1)
                    <tr class="c-table__row">
                        <td class="c-table__cell">{{$orders->products->pickupdate}}</td>
                        <td class="c-table__cell">{{$orders->products->pickupaddress}}</td>
                        <!-- <td class="c-table__cell">{{$orders->products->dropoffaddress}}</td> -->
                        <td class="c-table__cell">{{$orders->products->price}}</td>
                    </tr>
                  @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection