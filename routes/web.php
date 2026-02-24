<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/crear_cuenta', function () {
    return view('crear_cuenta'); 
});

Route::get('/menu', function () {
    return view('menu'); 
});