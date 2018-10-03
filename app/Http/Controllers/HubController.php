<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\Auth; 


class HubController extends Controller
{

    public function __construct(){
        $this->middleware('hub');
    }

    public function showaddproduct(){
        return view('hub.products.addproduct');
    }
    public function addproduct(){
    	$product = new product;
        $product->parcelname = request('parcelname');
        $product->dimensions = request('dimensions');
        $product->parcelweight = request('parcelweight');
        $product->pickupaddress = request('pickupaddress');
        $product->dropoffaddress = request('dropoffaddress');
        $product->pickupaddresslatitude = request('pickupaddresslatitude');
        $product->pickupaddresslongitude = request('pickupaddresslongitude');
        $product->dropoffaddresslatitude = request('dropoffaddresslatitude');
        $product->dropoffaddresslongitude = request('dropoffaddresslongitude');
        $product->price = request('price');
        $product->hubId = Auth::user()->id;
        $product->pickupdate = request('pickupdate');
        $product->pickuptime = request('pickuptime');
        $product->save();
        return back()->with('success', 'Product Added Successfully');
    }

    public function viewproduct(){
        $products = product::all();
        return view('hub.products.viewproduct',compact('products'));
    }

     public function showEditproduct($id){
        $product = product::findOrfail($id);
        return view('hub.products.editproduct', compact('product'));
    }

    public function updateproduct($id){
        $product = product::findOrfail($id);
        $product->parcelname = request('parcelname');
        $product->dimensions = request('dimensions');
        $product->parcelweight = request('parcelweight');
        $product->pickupaddress = request('pickupaddress');
        $product->dropoffaddress = request('dropoffaddress');
        $product->pickupaddresslatitude = request('pickupaddresslatitude');
        $product->pickupaddresslongitude = request('pickupaddresslongitude');
        $product->dropoffaddresslatitude = request('dropoffaddresslatitude');
        $product->dropoffaddresslongitude = request('dropoffaddresslongitude');
        $product->price = request('price');
        $product->pickupdate = request('pickupdate');
        $product->pickuptime = request('pickuptime');
        $product ->save();
        return back()->with('success', 'Product Updated Successfully');
    }

    public function deleteproduct($id){
        try{
            product::findOrfail($id)->delete();
            return back()->with('success','Product Deleted Successfully');
        } 	catch (Exception $e){
            return back()->with('danger','Some Thing Went Wrong!');
        }
    }


 }

