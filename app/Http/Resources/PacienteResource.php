<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rol' => $this->rol,
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'rut' => $this->rut,
            'prevision' => $this->prevision,
            'cama_hospitalizacion' => $this->cama_hospitalizacion,
            'diagnostico' => $this->diagnostico,
            'cirujano' => $this->cirujano,
            'cirugia' => $this->cirugia,
            'tratamiento_modalidad' => $this->tratamiento_modalidad,
            'tratamiento_medicamento' => $this->tratamiento_medicamento,
            'tipo_bloqueo' => $this->tipo_bloqueo,
            'factores_riesgo' => $this->factores_riesgo,
            'fecha_termino' => $this->fecha_termino,  // Asegúrate de incluir este campo
            'activo' => $this->activo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}