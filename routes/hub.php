<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('hub')->user();

    //dd($users);

    return view('hub.home');
})->name('home');


Route::get('/addproduct', 'HubController@showaddproduct');
Route::post('/addproduct', 'HubController@addproduct')->name('addproduct');
Route::get('/viewproduct', 'HubController@viewproduct');
Route::delete('/product/{id}/delete', 'HubController@deleteproduct')->name('deleteproduct');
Route::get('/product/{id}/edit', 'HubController@showEditproduct')->name('editproduct');
Route::post('/product/{id}/edit', 'HubController@updateproduct')->name('updateproduct');








