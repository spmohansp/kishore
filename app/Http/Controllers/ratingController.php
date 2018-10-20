<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Rating;


class ratingController extends Controller
{
    public function index($id){
    	$product = product::findOrfail($id);
    	return view('hub.products.rating',compact('product'));
    }

    public function addRatings($id){
    	$this->validate(request(),[
            'ratings'=>'required',
        ]);
    	$Rating = new Rating;
        $Rating->ratings = request('ratings');
        $Rating->productId = $id;
        $Rating->save();
        return redirect('/hub/myorders')->with('success','Rated Successfully!!');
    }

    public function rate(){
        return view('hub.rating.index');
    }
}
