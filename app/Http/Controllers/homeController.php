<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $countMascotas = User::withCount('mascotas')->get();
        return view('home')->with('countMascotas', $countMascotas);
    }
    //
}
