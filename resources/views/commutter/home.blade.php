@extends('commutter.layout.master')

@section('header')
   Dashboard
@endsection

@section('dashboard')
   is-active
@endsection

@section('content')
   @foreach($products as $product)
      <p class="flip">
          {{$product->parcelname}}
      </p>
<br><br>
   @endforeach
@endsection

@section('style')
   <style type="text/css">
      div.panel,p.flip
      {
         line-height: 30px;
         margin:auto;
         font-size:16px;
         padding:5px;
         text-align:center;
         background:#555;
         border:solid 1px #666;
         color:#ffffff;
         border-radius:3px;
         user-select:none
      }
      div.panel
      {
         display:none;
         background: white;
         text-align:left;
         color:black;
      }
      p.flip
      {
         cursor:pointer;
      }
   </style>
@endsection

@section('script')
   <script>
       $(document).ready(function(){
           $(".flip").click(function(){
               $(".panel").toggle();
           });
       });
   </script>
@endsection
