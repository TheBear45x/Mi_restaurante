<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller


{
        public function index()
    {
        return view('menu');
    }



}