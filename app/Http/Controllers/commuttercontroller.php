<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\receiver;
use App\Commutter;
use App\product;
use App\order;
use Illuminate\Support\Facades\Auth; 
use DB;



class commuttercontroller extends Controller
{
    public function __construct(){
        $this->middleware('commutter');
    }

    public function showaddreceiver(){
        return view('commutter.receivers.addreceiver');
    }

    public function addreceiver(){
        $receiver = new receiver;
        $receiver->receivername = request('receivername');
        $receiver->receiverphone = request('receiverphone');
        $receiver->email = request('email');
        $receiver->save();
        return back()->with('success', 'Receiver Added Successfully');
    }

    public function showEditreceiver($id){
        $receiver = receiver::findOrfail($id);
        return view('commutter.receivers.editreceiver', compact('receiver'));
    }

    public function deletereceiver($id){
        try{
            receiver::findOrfail($id)->delete();
            return back()->with('success','Reciever Deleted Successfully');
        } catch (Exception $e){
            return back()->with('danger','Some Thing Went Wrong!');
        }
    }

    public function updatereceiver($id){
        $addreceiver = addreceiver::findOrfail($id);
        $addreceiver->receivername = request('receivername');
        $addreceiver->receiverphone = request('receiverphone');
        $addreceiver->email = request('email');
        $addreceiver->save();
        return back()->with('success', 'Receiver Updated Successfully');
    }

    public function viewreceiver(){
        $receivers = receiver::all();
        return view('commutter.receivers.viewreceiver', compact('receivers'));
    }

    public function showhome(){
        $products = product::all();
        return view('commutter.home',compact('products'));
    }

    public function profile(){
        return view('commutter.profile.index');
    }


    public function updateCommutterLocation(){
        $commutter= Commutter::where([['id',Auth::user()->id]])->first();
        $commutter->latidude=request()->latidude;
        $commutter->longitude=request()->longitude;
        $commutter->save();
        return 'Success';
    }









    public function showMap(){
       $products = product::all();
        return view('commutter.activeOrder.map',compact('products'));
    }




    public function liveOrder(){
            // $address='Salem, Tamil Nadu, India';
            // if(!empty($address)){
            //         //Formatted address
            //         $formattedAddr = str_replace(' ','+',$address);
            //         //Send request and receive json data by address
            //          $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyC3_nchoqV696350i6DaDNW2WgQ42F2dRw&address='.$formattedAddr.'&sensor=false'); 
            //         $output = json_decode($geocodeFromAddr);
            //         //Get latitude and longitute from json data
            //         $data['latitude']  = $output->results[0]->geometry->location->lat; 
            //         $data['longitude'] = $output->results[0]->geometry->location->lng;
            //         //Return latitude and longitude of the given address
            //         return $data;
            //     }else{
            //         return false;   
            //     }
        return view('commutter.activeOrder.orderList');
    }

    public function getLiveData(){
        $latitude=request()->latidude;
        $longitude=request()->longitude;
        $liveData= product::select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( pickupaddresslatitude ) ) * cos( radians( pickupaddresslongitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( pickupaddresslatitude ) ) ) ) AS distance'))->having('distance', '<', 100)->where([['status','open']])->orderBy('distance')->get();
        // return '<p>'.$liveData.'</p>';

        if(!empty($liveData)){
            $finalData ='<div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Parcel Name</th>
                        <th class="c-table__cell c-table__cell--head">Parcel Weight</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Contact Person</th>
                        <th class="c-table__cell c-table__cell--head">Parcel Contact Number</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Address</th>
                        <th class="c-table__cell c-table__cell--head">Drop off Address</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Distance</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Date</th>
                        <th class="c-table__cell c-table__cell--head">Pickup Time</th>
                        <th class="c-table__cell c-table__cell--head">Price</th>
                        <th class="c-table__cell c-table__cell--head">Actions</th>
                    </tr>
                    </thead>
                <tbody>';
            foreach ($liveData as $key => $value) {
                $finalData=$finalData.'<tr>
                        <td class="c-table__cell">'.$value->parcelname.'</td>
                        <td class="c-table__cell">'.$value->parcelweight.'</td>
                        <td class="c-table__cell">'.Auth::user()->name.'</td>
                        <td class="c-table__cell">'.Auth::user()->mobile.'</td>
                        <td class="c-table__cell">'.$value->pickupaddress.'</td>
                        <td class="c-table__cell">'.$value->dropoffaddress.'</td>
                        <td class="c-table__cell">'.round($value->distance).' KM</td>
                        <td class="c-table__cell">'.$value->pickupdate.'</td>
                        <td class="c-table__cell">'.$value->pickupStartTime.' - '.$value->pickupEndTime.'</td>
                        <td class="c-table__cell">'.$value->price.'</td>
                        <td class="c-table__cell"><a href="pickup/'.$value->id.'"><button class="btn btn-success btn-small">Pick Up</button></a></td></tr>';
            }
            return $finalData.'</tbody></table>';
        }else{
            return 'No Order Found';
        }
    }


    public function pickup_products($id){
        $products = product::findOrfail($id);
        $products->status='Allocated';
        $products->save();

        $order = new order;
        $order->commutterId = Auth::user()->id;
        $order->productId = $products->id;
        $order->save();
        return back()->with('success','Product Picked!!');
    }

    public function ActiveOrder(){
        return view('commutter.activeOrder.activeOrder');
    }


    public function OrderMapLocation($id){
        $products = product::findOrfail($id);
        return view('commutter.activeOrder.orderMap',compact('products'));
    }

    // send status
    public function updateStatus($id){
        $products = product::findOrfail($id);
        return view('commutter.activeOrder.updateStatus',compact('products'));
    }

    public function updateProdtctStatus($id){
        $products = product::findOrfail($id);
        $products->status=request()->status;
        $products->save();
        if(request()->status=='completed'){
            $orders = order::where([['productId',$id]])->first();
            $orders->status=1;
            $orders->save();
        }
        return back()->with('success','Product Status Updated Successfully!!');

    }

    public function myEarnings(){
        return view('commutter.activeOrder.myearnings');
    }
}