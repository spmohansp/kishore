<?php


namespace App\Http\Controllers;
use App\receiver;
// use App\projecthead;

use Illuminate\Http\Request;

class commuttercontroller extends Controller
{
    public function __construct(){
        $this->middleware('commutter');
    }

    

    

    public function showEditreceiver($id){
        $receiver = receiver::findOrfail($id);
        
        return view('commutter.receiver.editreceiver', compact('receiver'));
    }


    public function deletereceiver($id){
        try{

            $Request = receiver::findOrfail($id);

            $Request->delete();
            return back();
        } 	catch (Exception $e){
            return back();
        }
    }

      

    
 
}
