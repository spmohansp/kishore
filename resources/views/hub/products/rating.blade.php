@extends('hub.layoutMobile.master')

@section('product')
    is-active
@endsection

@section('viewproduct')
    is-active
@endsection

@section('header')
    Rating
@endsection

@section('content')
		
		  <form action="{{route('hub.ratings',$product->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="c-card">
            <div class="row u-mb-medium">
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input1">Parcel Name</label>
                        <input class="form-control" id="input1" value="{{$product->parcelname}}"  disabled="" required type="text" >
                    </div>
                </div>
                <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input2">pick up Address</label>
                        <input class="form-control" id="input2" value="{{$product->pickupaddress}}"  disabled="" required type="text">
                    </div>
                </div>
                 <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                        <label class="c-field__label" for="input2">Drop off Address</label>
                        <input class="form-control" id="input2" value="{{$product->dropoffaddress}}"  disabled="" required type="text">
                    </div>
                </div>

                 <div class="col-lg-6 u-mb-xsmall">
                    <div class="form-group">
                    	 <label class="c-field__label" for="input2">Star Rating</label><br>
                <fieldset class="rating">
			        <input type="radio" id="star5" name="ratings" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
			        <input type="radio" id="star4" name="ratings" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
			        <input type="radio" id="star3" name="ratings" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
			        <input type="radio" id="star2" name="ratings" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
			        <input type="radio" id="star1" name="ratings" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
			    </fieldset>
			</div>
		</div>


            </div>
            <div  style="text-align: center">
                <button class="btn btn-success btn-small" type="submit">Save</button>&emsp;&emsp;&emsp;&emsp;
                <button class="btn btn-warning btn-small" type="reset">Cancel</button>
            </div>
        </div>
    </form>






<style type="text/css">
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>

@endsection