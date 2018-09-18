<?php


namespace App\Http\Controllers;
// use App\projecthead;

use Illuminate\Http\Request;

class commuttercontroller extends Controller
{
    public function __construct(){
        $this->middleware('commutter');
    }

    public function showaddproduct(){
        return view('commutter.products.addproduct');
    }
}
