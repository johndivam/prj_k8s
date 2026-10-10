<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dbtest', function () {
    DB::table('users')->delete();
    DB::table('users')->insert(['name' => 'test'.random_int(10,1000), 'email' => 'ff@eee.com', 'password' => 'fff']);
    return DB::table('users')->first();
});