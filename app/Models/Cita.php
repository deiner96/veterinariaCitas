<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fecha_registro',
        'hora_inicial',
        'hora_final',
        'mascota',
        'propietario',
        'celular_cliente',
        'novedad',
    ];
}
