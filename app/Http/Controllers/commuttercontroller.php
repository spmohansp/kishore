<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\receiver;


class commuttercontroller extends Controller
{
    public function __construct(){
        $this->middleware('commutter');
    }

    public function showaddreceiver()
    {
        return view('commutter.receivers.addreceiver');
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

    public function showEditreceiver($id)
    {
        $receiver = receiver::findOrfail($id);

        return view('commutter.receivers.editreceiver', compact('receiver'));
    }

    public function deletereceiver($id)
    {
        try {

            $Request = receiver::findOrfail($id);

            $Request->delete();
            return back();
        } catch (Exception $e) {
            return back();
        }
    }

    public function updatereceiver($id)
    {
        $addreceiver = addreceiver:: findOrfail($id);
        $addreceiver->parcelname = request('receivername');
        $addreceiver->dimensions = request('receiverphone');
        $addreceiver->parcelweight = request('email');
        $addreceiver->save();
        return back();
    }


    public function viewreceiver()
    {
        $receivers = receiver::all();
        return view('commutter.receivers.viewreceiver', compact('receivers'));
    }



    

    


    
 
}
