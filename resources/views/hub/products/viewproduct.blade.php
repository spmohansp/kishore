@extends('hub.layoutMobile.master')

@section('product')
    is-active
@endsection

@section('viewproduct')
    is-active
@endsection

@section('header')
    Active product
@endsection

@section('content')
<div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="c-table__head">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head">Parcel Name</th>
                            <th class="c-table__cell c-table__cell--head">Dimensions</th>
                            <th class="c-table__cell c-table__cell--head">Parcel Weight</th>
                            <th class="c-table__cell c-table__cell--head">Pickup Address</th>
                            <th class="c-table__cell c-table__cell--head">Dropoff Address</th>
                            <th class="c-table__cell c-table__cell--head">Pickup Date</th>
                            <th class="c-table__cell c-table__cell--head">Pickup Time</th>
                            <th class="c-table__cell c-table__cell--head">Price</th>
                            <th class="c-table__cell c-table__cell--head">Status</th>
                            <th class="c-table__cell c-table__cell--head">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach(Auth::user()->products as $product)
                   @if($product->status!='completed')
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{$product->parcelname}}</td>
                            <td class="c-table__cell">{{$product->dimensions}}</td>
                            <td class="c-table__cell">{{$product->parcelweight}}</td>
                            <td class="c-table__cell">{{$product->pickupaddress}}</td>
                            <td class="c-table__cell">{{$product->dropoffaddress}}</td>
                            <td class="c-table__cell">{{$product->pickupdate}}</td>
                            <td class="c-table__cell">{{$product->pickupStartTime}}</td>
                            <td class="c-table__cell">{{$product->price}}</td>
                            <td class="c-table__cell">{{$product->status}}</td>
                            <td class="c-table__cell">
                                <form action="{{ route('hub.deleteproduct', $product->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('hub.editproduct', $product->id) }}"><i class="fa fa-pencil"></i></a>
                                    <a onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endif()
                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection