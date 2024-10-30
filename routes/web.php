<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('pages.auth.login');
});
Route::get('home', function () {
    return view('pages.dashboard');
});

//kalau mau crud pakenya resource bukan get
Route::resource('user', UserController::class);

//url auth dipindahkan  di app/providers/fotifyservice
// Route::get('/login', function () {
//     return view('pages.auth.login');
// });
// Route::get('/register', function () {
//     return view('pages.auth.register');
// });

