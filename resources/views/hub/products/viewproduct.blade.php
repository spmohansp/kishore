@extends('hub.layout.master')
@section('products')
    is-active
@endsection

@section('addproduct')
    is-active
@endsection

@section('header')
    Add product
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Parcel Name</th>
                        <th class="c-table__cell c-table__cell--head">Dimensions</th>
                        <th class="c-table__cell c-table__cell--head">Parcel Weight</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Address</th>
                        <th class="c-table__cell c-table__cell--head">Dropoff Address</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Date</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Time</th>
                        <th class="c-table__cell c-table__cell--head">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                   
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{$addproduct->parcelname}}</td>
                            <th class="c-table__cell">{{$addproduct->dimensions}}</th>
                            <th class="c-table__cell">{{$addproduct->parcelweight}}</th>
                            <th class="c-table__cell">{{$addproduct->pickupaddresss}}</th>
                            <th class="c-table__cell">{{$addproduct->dropoffaddress}}</th>
                            <th class="c-table__cell">{{$addproduct->pickupdate}}</th>
                            <th class="c-table__cell">{{$addproduct->pickuptime}}</th>
                            <td class="c-table__cell">
                                <div class="c-dropdown dropdown">
                                    <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                        More <i class="feather icon-chevron-down"></i>
                                    </a>

                                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable1">
                                        <form action="{{ route('hub.deleteproduct', $addproduct->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a class="c-dropdown__item dropdown-item" href="{{ route('hub.editproduct', $addproduct->id) }}">Edit</a>
                                            <button class="c-dropdown__item dropdown-item" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection