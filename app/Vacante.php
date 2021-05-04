<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    protected $fillable = [
        'titulo', 'imagen', 'descripcion', 'skills', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ]; // todo menos activa (default), user_id (se pasa automaticamente)

    // Relación 1:1 categoria y vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación 1:1 salario y vacante
    public function salario()
    {
        return $this->belongsTo(Salario::class); // categoria de rango salario
    }

    // Relación 1:1 ubicacion y vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class); // categoria de ubicacion
    }

    // Relación 1:1 experiencia y vacante
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class); // categoria de anios experiencia
    }

    // Relación 1:1 reclutador y vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación 1:n vacante y candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class); // 1 vacante tiene varias job aplications
    }
}
