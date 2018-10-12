@extends('commutter.layoutMobile.master')

@section('Orders')
    is-active
@endsection

@section('ActiveOrder')
    is-active
@endsection

@section('header')
    Active Orders
@endsection


@section('content')

<div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Parcel Name</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Address</th>
                        <th class="c-table__cell c-table__cell--head">Drop Off Address</th>
                        <th class="c-table__cell c-table__cell--head">DropoffContact Person</th>
                        <th class="c-table__cell c-table__cell--head">Dropoff Contact Number</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Date</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Time</th>
                        <th class="c-table__cell c-table__cell--head">Dropoff - Time</th>
                        <th class="c-table__cell c-table__cell--head">Price</th>
                        <th class="c-table__cell c-table__cell--head">Status</th>
                        <th class="c-table__cell c-table__cell--head">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach(Auth::user()->getallorders as $orders)
                    @if($orders->status==0)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{$orders->products->parcelname}}</td>
                            <td class="c-table__cell"><a href="https://maps.google.com/?saddr=My%20Location&daddr={{$orders->products->pickupaddress}}">{{$orders->products->pickupaddress}}</a></td>
                            <td class="c-table__cell">{{$orders->products->dropoffaddress}}</td>
                            <td class="c-table__cell">{{$orders->products->dropoffContactName}}</td>
                            <td class="c-table__cell">{{$orders->products->dropoffContactNumber}}</td>
                            <td class="c-table__cell">{{$orders->products->pickupdate}}</td>
                            <td class="c-table__cell">{{$orders->products->pickupStartTime}} - {{$orders->products->pickupEndTime}}</td>
                            <td class="c-table__cell">{{$orders->products->dropOffStartTime}} - {{$orders->products->dropOffEndTime}}</td>
                            <td class="c-table__cell">{{$orders->products->price}}</td>
                            <td class="c-table__cell">{{$orders->products->status}}</td>
                            <td class="c-table__cell">
                                <a class="c-dropdown__item dropdown-item" href="{{route('commutter.updateStatus',$orders->products->id)}}"><i class="fa fa-location-arrow" aria-hidden="true"></i></a>
                                <a class="c-dropdown__item dropdown-item" href="{{route('commutter.OrderMapLocation',$orders->products->id)}}"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                <a href="https://maps.google.com/?saddr={{$orders->products->pickupaddress}}&daddr={{$orders->products->dropoffaddress}}">map</a>
                            </td>
                        </tr>
                        @endif
                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection