<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\User;
use App\Models\Cita;

class citasController extends Controller
{
    public function index(){
        $user = Auth::user()->documento_cliente;
        $mascotas = Mascota::where('documento_cliente', '=', auth()->user()->documento_cliente)->get();
        return view('calendario.index')->with('mascotas',$mascotas);
    }
    public function listar(){
        $citas = Cita::all();
        $nueva_cita = [];

        foreach($citas as $value){
            $nueva_cita[] = [
                "id" =>$value->id,
                "start" =>$value->fecha_registro." ".$value->hora_inicial,
                "end"=>$value->fecha_registro." ".$value->hora_final,
                "title"=>$value->novedad,
                "textColor"=>"#ccc"
            ];
        }
        return response()->json($nueva_cita);
    }
    public function validar_fecha($fecha, $hora_inicial, $hora_final){
        $citas = Cita::where('fecha_registro', $fecha)
        ->where(function($query) use ($hora_inicial, $hora_final){
                        $query->whereBetween("hora_inicial", [$hora_inicial, $hora_final])
                        ->orWhereBetween("hora_final", [$hora_inicial, $hora_final]);
                    })->first();
        return $citas == null ? true : false;

    }
    public function guardar(Request $request){
        $input = $request->all();

        if($this->validar_fecha($input["fecha_registro"], $input["hora_inicial"], $input["hora_final"])) {
            $citas = Cita::create([
                "fecha_registro"=>$input["fecha_registro"],
                "hora_inicial"=>$input["hora_inicial"],
                "hora_final"=>$input["hora_final"],
                "mascota"=>$input["mascota"],
                "propietario"=>$input["propietario"],
                "celular_cliente"=>$input["celular_cliente"],
                "novedad"=>$input["novedad"],
            ]);
            return response()->json(["ok"=>true]);
        }else{
            return response()->json(["ok"=>false]);
        }
    }
}
