<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('commutter')->user();

    //dd($users);

    return view('commutter.home');
})->name('home');


Route::get('/addproduct', 'commuttercontroller@showaddproduct');
Route::post('/addproduct', 'commuttercontroller@addproduct')->name('addproduct');
Route::get('/viewproduct', 'commuttercontroller@viewAnimator');
Route::delete('/viewproduct/{id}/delete', 'commuttercontroller@deleteproduct')->name('deleteproduct');
Route::get('/viewproduct/{id}/edit', 'commuttercontroller@showEditproduct')->name('editviewproduct');
Route::post('/viewproduct/{id}/edit', 'commuttercontroller@updateproduct')->name('updateviewproduct');
