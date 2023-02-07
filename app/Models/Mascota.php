<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificador',
        'nombre',
        'tipo_mascota',
        'documento_cliente',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User','documento_cliente','documento_cliente');
    }
}
