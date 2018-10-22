<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Commutter;
use DB;



use Illuminate\Support\Facades\Auth; 


class HubController extends Controller
{

    public function __construct(){
        $this->middleware('hub');
    }


    public function homeMap(){
        $latitude=request()->latidude;
        $longitude=request()->longitude;
        return $liveData= Commutter::select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latidude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latidude ) ) ) ) AS distance'))->having('distance', '<', 100)->get();
        // $finalData='[';
        // foreach ($liveData as $key => $value) {
        //     if ($key != 0) {
        //       $finalData= $finalData.",";
        //     }
        //     $finalData= $finalData."['".$value->name."',".$value->latidude.",".$value->longitude."]";
        // }
        // return $finalData.']';
    }

    public function showaddproduct(){
        return view('hub.products.addproduct');
    }
    public function addproduct(){
        $this->validate(request(),[
            'parcelname'=>'required',
            'dimensions'=>'required',
            'parcelweight'=>'required',
            'parcelweight'=>'required',
            'dropoffaddress'=>'required',
            'dropoffContactName'=>'required',
            'dropoffContactNumber'=>'required',
            'pickupdate'=>'required',
            'pickupStartTime'=>'required',
            'pickupEndTime'=>'required|after:pickupStartTime',
            'dropOffStartTime'=>'required|after:pickupEndTime',
            'dropOffEndTime'=>'required|after:dropOffStartTime',
            'price'=>'required',
            'product'=>'required',
            
        ]);
        $files = request()->parcelname.now()->timestamp.'.'.request()->file('product')->getClientOriginalExtension(); 
        request()->file('product')->move(base_path().'/public/products', $files);
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
        $product->dropoffContactName = request('dropoffContactName');
        $product->dropoffContactNumber = request('dropoffContactNumber');
        $product->pickupdate = request('pickupdate');
        $product->pickupStartTime = request('pickupStartTime');
        $product->pickupEndTime = request('pickupEndTime');
        $product->dropOffStartTime = request('dropOffStartTime');
        $product->dropOffEndTime = request('dropOffEndTime');
        $product->price = request('price');
        $product->product = $files;
        $product->hubId = Auth::user()->id;
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
        $this->validate(request(),[
            'parcelname'=>'required',
            'dimensions'=>'required',
            'parcelweight'=>'required',
            'parcelweight'=>'required',
            'dropoffaddress'=>'required',
            'dropoffContactName'=>'required',
            'dropoffContactNumber'=>'required',
            'pickupdate'=>'required',
            'pickupStartTime'=>'required',
            'pickupEndTime'=>'required|after:pickupStartTime',
            'dropOffStartTime'=>'required|after:pickupEndTime',
            'dropOffEndTime'=>'required|after:dropOffStartTime',
            'price'=>'required',
        ]);
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

        $product->dropoffContactName = request('dropoffContactName');
        $product->dropoffContactNumber = request('dropoffContactNumber');

        $product->pickupStartTime = request('pickupStartTime');
        $product->pickupEndTime = request('pickupEndTime');
        $product->dropOffStartTime = request('dropOffStartTime');
        $product->dropOffEndTime = request('dropOffEndTime');

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

    public function myorders(){
        return view('hub.products.myOrders');
    }


    public function profile(){
        return view('hub.profile.index');
    }

 }

