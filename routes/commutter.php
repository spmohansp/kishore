<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('commutter')->user();

    //dd($users);

    return view('commutter.home');
})->name('home');


Route::get('/addreceiver', 'commuttercontroller@showaddreceiver');
Route::post('/addreceiver', 'commuttercontroller@addreceiver')->name('addreceiver');
Route::get('/viewreceiver', 'commuttercontroller@viewreceiver');

