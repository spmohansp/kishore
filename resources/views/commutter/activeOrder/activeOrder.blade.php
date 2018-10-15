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
   @foreach(Auth::user()->getallorders as $orders)
    @if($orders->status==0)
        @if($orders->products->status=='Allocated')
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="thumbnail shadow-depth-4">
                        <div class="caption">
                            <center>
                                <p>Pick Up Date:  <b>{{$orders->products->pickupdate}}</b></p>
                                <p>Price: <b>{{$orders->products->price}} /-</b></p>
                                 <a class="c-dropdown__item dropdown-item" href="{{route('commutter.updateStatus',$orders->products->id)}}"><i class="fa fa-location-arrow" aria-hidden="true"></i></a>
                                  <a class="c-dropdown__item dropdown-item" href="https://maps.google.com/?saddr=My%20Location&daddr={{$orders->products->pickupaddress}}"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            </center>
                             <div class="col-sm-02 col-md-02">
                                <p>Parcel Name: <b> {{$orders->products->parcelname}}</b></p>
                                <p>Pickup Address: <b>{{$orders->products->pickupaddress}}</b></p>
                             </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        @elseif($orders->products->status=='In_Transmit')
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="thumbnail shadow-depth-4">
                        <div class="caption">
                            <center>
                                <p>Pick Up Date: <b> {{$orders->products->pickupdate}}</b></p>
                                <p>Price:<b> {{$orders->products->price}} /-</b></p>
                                  <a class="c-dropdown__item dropdown-item" href="{{route('commutter.updateStatus',$orders->products->id)}}"><i class="fa fa-location-arrow" aria-hidden="true"></i></a>
                                   <a class="c-dropdown__item dropdown-item" href="https://maps.google.com/?saddr={{$orders->products->pickupaddress}}&daddr={{$orders->products->dropoffaddress}}"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            </center>
                             <div class="col-sm-02 col-md-02">
                                <p>Parcel Name: <b> {{$orders->products->parcelname}}</b></p>
                                <p>Drop Off Address: <b> {{$orders->products->dropoffaddress}}</b> </p>
                                <p>DropoffContact Person: <b>{{$orders->products->dropoffContactName}}</b> </p>
                                <p>Dropoff Contact Number: <b>{{$orders->products->dropoffContactNumber}}</b></p>
                             </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
 @endforeach


<!-- <div class="row">
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
                            <td class="c-table__cell">{{$orders->products->pickupaddress}}</td>

                            @if($orders->products->status=='Allocated')
                                <td></td>
                                <td></td>
                                <td></td>
                            @elseif($orders->products->status=='In_Transmit')
                                <td class="c-table__cell">{{$orders->products->dropoffaddress}}</td>
                                <td class="c-table__cell">{{$orders->products->dropoffContactName}}</td>
                                <td class="c-table__cell">{{$orders->products->dropoffContactNumber}}</td>
                            @endif

                            <td class="c-table__cell">{{$orders->products->pickupdate}}</td>
                            <td class="c-table__cell">{{$orders->products->pickupStartTime}} - {{$orders->products->pickupEndTime}}</td>
                            <td class="c-table__cell">{{$orders->products->dropOffStartTime}} - {{$orders->products->dropOffEndTime}}</td>
                            <td class="c-table__cell">{{$orders->products->price}}</td>
                            <td class="c-table__cell">{{$orders->products->status}}</td>
                            <td class="c-table__cell">
                                <a class="c-dropdown__item dropdown-item" href="{{route('commutter.updateStatus',$orders->products->id)}}"><i class="fa fa-location-arrow" aria-hidden="true"></i></a>
                            @if($orders->products->status=='Allocated')
                                <a class="c-dropdown__item dropdown-item" href="https://maps.google.com/?saddr=My%20Location&daddr={{$orders->products->pickupaddress}}"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            @elseif($orders->products->status=='In_Transmit')
                                <a class="c-dropdown__item dropdown-item" href="https://maps.google.com/?saddr={{$orders->products->pickupaddress}}&daddr={{$orders->products->dropoffaddress}}"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            @endif
                            </td>
                        </tr>
                        @endif
                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

@endsection