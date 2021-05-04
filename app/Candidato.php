<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    //
    protected $fillable = [
        'nombre', 'email', 'cv', 'vacante_id'
    ];

    //??? falta elación candidato pertenece a una vacante
}
