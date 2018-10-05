<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\receiver;
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
        $liveData= product::select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( pickupaddresslatitude ) ) * cos( radians( pickupaddresslongitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( pickupaddresslatitude ) ) ) ) AS distance'))->having('distance', '<', 105)->where([['status','open']])->orderBy('distance')->get();
        // return '<p>'.$liveData.'</p>';

        if(!empty($liveData)){
            
            $finalData =' <table style="width:100%" border="1">
                <thead>
                <tr>
                    <th>Parcel Name</th>
                    <th>Parcel Weight</th>
                    <th>Pick up Address</th>
                    <th>Drop off Address</th>
                    <th>Pickup Address Distance</th>
                    <th>Pick up Time</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>';
            foreach ($liveData as $key => $value) {
                $finalData=$finalData.'<tr><td>'.$value->parcelname.'</td><td>'.$value->parcelweight.'</td><td>'.$value->pickupaddress.'</td><td>'.$value->dropoffaddress.'</td><td>'.round($value->distance).' KM</td><td>'.$value->pickupStartTime.' - '.$value->pickupEndTime.'</td><td>'.$value->price.'</td><td><a href="pickup/'.$value->id.'"><button class="btn btn-primary">Pickup</button></a></td></tr>';
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
}