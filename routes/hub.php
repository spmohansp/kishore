<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('hub')->user();

    //dd($users);

    return view('hub.home');
})->name('home');

