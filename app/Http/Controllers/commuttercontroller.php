<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\receiver;
use App\product;


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
}