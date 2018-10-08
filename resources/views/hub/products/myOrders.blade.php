@extends('hub.layoutMobile.master')

@section('product')
    is-active
@endsection

@section('viewproduct')
    is-active
@endsection

@section('header')
    My Orders
@endsection

@section('content')
<div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th scope="col">Parcel Name</th>
                        <th scope="col">Pickup Address</th>
                        <th scope="col">Dropoff Address</th>
                        <th scope="col">Pickup Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach(Auth::user()->products as $product)
                   @if($product->status=='completed')
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{$product->parcelname}}</td>
                            <td class="c-table__cell">{{$product->pickupaddress}}</td>
                            <td class="c-table__cell">{{$product->dropoffaddress}}</td>
                            <td class="c-table__cell">{{$product->pickupdate}}</td>
                            <td class="c-table__cell">{{$product->price}}</td>
                            <td class="c-table__cell">{{$product->status}}</td>
                        </tr>
                        @endif()
                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection