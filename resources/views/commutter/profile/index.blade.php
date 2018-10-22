@extends('commutter.layoutMobile.master')

@section('product')
    is-active
@endsection

@section('addorder')
    is-active
@endsection

@section('header')
    Profile
@endsection

@section('activeButton')
		<a class="pull-right" href="{{ url('/commutter/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
		</a>
        <form id="logout-form" action="{{ url('/commutter/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
@endsection

@section('content')
		<a class="pull-right" href="{{ url('/commutter/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
		</a>
        <form id="logout-form" action="{{ url('/commutter/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
@endsection