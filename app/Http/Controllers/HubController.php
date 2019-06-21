<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\receiver;


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
        $product->pickupaddresss = request('pickupaddresss');
        $product->dropoffaddress = request('dropoffaddress');
        $product->pickupdate = request('pickupdate');
        $product->pickuptime = request('pickuptime');
        $product->save();
        return back();
    }
     public function showEditproduct($id){
        $addproduct = addproduct::findOrfail($id);
        
        return view('hub.products.editproduct', compact('addproduct'));
    }

    public function deleteproduct($id){
        try{

            $Request = product::findOrfail($id);

            $Request->delete();
            return back();
        } catch (Exception $e){
            return back();
        }
    }

    public function updateproduct($id){
        $addproduct = addproduct :: findOrfail($id);
        $addproduct->parcelname = request('parcelname');
        $addproduct->dimensions = request('dimensions');
        $addproduct->parcelweight = request('parcelweight');
        $addproduct->pickupaddresss = request('pickupaddresss');
        $addproduct->dropoffaddress = request('dropoffaddress');
        $addproduct->pickupdate = request('pickupdate');
        $addproduct->pickuptime = request('pickuptime');
        $addproduct ->save();
        return back();
    }



    public function viewproduct(){
        $product = product::all();
        return view('hub.products.viewproduct',compact('product'));
    }

    public function showaddreceiver()
    {
        return view('hub.products.addreceiver');
    }

    public function addreceiver()
    {
        $receiver = new receiver;
        $receiver->receivername = request('receivername');
        $receiver->receiverphone = request('receiverphone');
        $receiver->email = request('email');
        $receiver->save();
        return back();
    }
 
 }

