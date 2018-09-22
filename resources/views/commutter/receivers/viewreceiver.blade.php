@extends('commutter.layout.master')
@section('receivers')
    is-active
@endsection

@section('addreceiver')
    is-active
@endsection

@section('header')
    Add receiver
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Receiver Name</th>
                        <th class="c-table__cell c-table__cell--head">Receiver's phone</th>
                        <th class="c-table__cell c-table__cell--head">Receiver's Email Address</th>
                        <th class="c-table__cell c-table__cell--head">Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($receivers as $receiver)
                        <tr class="c-table__row">
                            <td class="c-table__cell">{{$receiver->receivername}}</td>
                            <th class="c-table__cell">{{$receiver->receiverphone}}</th>
                            <th class="c-table__cell">{{$receiver->email}}</th>
                            <td class="c-table__cell">
                                <div class="c-dropdown dropdown">
                                    <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                        More <i class="feather icon-chevron-down"></i>
                                    </a>

                                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable1">
                                        <form action="{{ route('commutter.deletereceiver', $receiver->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a class="c-dropdown__item dropdown-item" href="{{ route('commutter.editreceiver', $receiver->id) }}">Edit</a>
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