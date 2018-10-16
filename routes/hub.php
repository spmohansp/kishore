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
Route::get('/product/{id}/edit', 'HubController@showEditproduct')->name('editproduct');
Route::post('/product/{id}/edit', 'HubController@updateproduct')->name('updateproduct');
Route::delete('/product/{id}/delete', 'HubController@deleteproduct')->name('deleteproduct');


Route::get('/myorders', 'HubController@myorders');
Route::get('/profile', 'HubController@profile');
Route::get('/homeMap', 'HubController@homeMap');




Route::get('/rating/{id}/rateProduct', 'ratingController@index');

Route::post('/rating/{id}/rateProduct', 'ratingController@addRatings')->name('ratings');