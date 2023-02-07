<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class registerMascotasController extends Controller
{
    public function index(){
        $mascotas = Mascota::all();
        return view('registrarMascota', compact('mascotas'));
    }
    //
    public function registerMascota(Request $request){

        $mascota = new Mascota();
        $mascota->identificador = $request->identificador;
        $mascota->nombre = $request->nombre;
        $mascota->tipo_mascota = $request->tipo_mascota;
        $mascota->documento_cliente = $request->documento_cliente;
        $mascota->save();
        $saved = $mascota->save();
        if($saved){
            return redirect()->route('registrar-mascota')->with(\Session::flash('message', 'Mascota registrada correctamente'));
        }else {
            return redirect()->route('registrar-mascota')->with('false','Registro fallido');
        }
    }
}
