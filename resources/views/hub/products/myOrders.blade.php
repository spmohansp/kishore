@extends('hub.layout.master')

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
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Parcel Name</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Address</th>
                        <th class="c-table__cell c-table__cell--head">Dropoff Address</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Date</th>
                        <th class="c-table__cell c-table__cell--head">Price</th>
                        <th class="c-table__cell c-table__cell--head">Status</th>
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