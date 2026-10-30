<?php

use Illuminate\Support\Facades\Route;

//Route::view('/', 'store.home')->name('store.home');

Route::get('/', function () {
    return view('store.home');
});

Route::view('/', 'store.home')->name('store.home');