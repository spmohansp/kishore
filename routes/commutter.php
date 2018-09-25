<?php


Route::get('/home', 'commuttercontroller@showhome')->name('home');


Route::get('/addreceiver', 'commuttercontroller@showaddreceiver');
Route::post('/addreceiver', 'commuttercontroller@addreceiver')->name('addreceiver');
Route::get('/viewreceiver', 'commuttercontroller@viewreceiver');
Route::get('/viewreceiver/{id}/edit', 'commuttercontroller@showEditreceiver')->name('editreceiver');
Route::post('/viewreceiver/{id}/edit', 'commuttercontroller@updatereceiver')->name('updatereceiver');
Route::delete('/viewreceiver/{id}/delete', 'commuttercontroller@deletereceiver')->name('deletereceiver');