<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\User;
use App\Models\Cita;

class registroCitasController extends Controller
{
    public function index() {
        $user = Auth::user()->documento_cliente;
        $mascotas = Mascota::where('documento_cliente', '=', auth()->user()->documento_cliente)->get();
        return view('citasRegistros')->with('mascotas', $mascotas);
    }
    public function registerCitas(Request $request){
        $citas = new Cita();
        $citas->fecha_registro = $request->fecha_registro;
        $citas->mascota = $request->mascota;
        $citas->celular_cliente = $request->celular_cliente;
        $citas->novedad = $request->novedad;
        $citas->save();
        $saved = $citas->save();
        if($saved){
            return redirect()->route('registros.citas')->with(\Session::flash('message', 'Cita registrada correctamente'));
        }else {
            return redirect()->route('home')->with('false','Registro fallido');
        }
    //
    }
}
