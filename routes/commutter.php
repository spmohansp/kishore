<?php


Route::get('/home', 'commuttercontroller@showhome')->name('home');


Route::get('/addreceiver', 'commuttercontroller@showaddreceiver');
Route::post('/addreceiver', 'commuttercontroller@addreceiver')->name('addreceiver');
Route::get('/viewreceiver', 'commuttercontroller@viewreceiver');
Route::get('/viewreceiver/{id}/edit', 'commuttercontroller@showEditreceiver')->name('editreceiver');
Route::post('/viewreceiver/{id}/edit', 'commuttercontroller@updatereceiver')->name('updatereceiver');
Route::delete('/viewreceiver/{id}/delete', 'commuttercontroller@deletereceiver')->name('deletereceiver');






Route::get('/showMap', 'commuttercontroller@showMap');
Route::get('/liveOrder', 'commuttercontroller@liveOrder');
Route::get('/getLiveData', 'commuttercontroller@getLiveData');
Route::get('pickup/{id}', 'commuttercontroller@pickup_products');




Route::get('ActiveOrder', 'commuttercontroller@ActiveOrder');
Route::get('OrderMapLocation/{id}/show', 'commuttercontroller@OrderMapLocation')->name('OrderMapLocation');


Route::get('updateStatus/{id}/update', 'commuttercontroller@updateStatus')->name('updateStatus');
Route::post('updateProdtctStatus/{id}/update', 'commuttercontroller@updateProdtctStatus')->name('updateProdtctStatus');

// GET EARNINGS
Route::get('myEarnings', 'commuttercontroller@myEarnings');



Route::get('/profile', 'commuttercontroller@profile');




