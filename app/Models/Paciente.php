<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'rol',
        'nombre',
        'edad',
        'rut',
        'prevision',
        'cama_hospitalizacion',
        'diagnostico',
        'cirujano',
        'cirugia',
        'tratamiento_modalidad',
        'tratamiento_medicamento',
        'tipo_bloqueo',
        'factores_riesgo',
        'fecha_termino',
        'activo',
    ];

    protected $casts = [
        'factores_riesgo' => 'array',
    ];
}