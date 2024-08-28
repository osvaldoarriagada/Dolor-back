<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PacienteResource;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    public function index()
    {
        // Obtener todos los pacientes
        return PacienteResource::collection(Paciente::all());
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'rol' => 'required|unique:pacientes',
            'nombre' => 'required',
            'edad' => 'required|integer',
            'rut' => 'required',
            'prevision' => 'required',
            'cama_hospitalizacion' => 'required',
            'diagnostico' => 'required',
            'cirujano' => 'required',
            'cirugia' => 'required',
            'tratamiento_modalidad' => 'nullable|string',
            'tratamiento_medicamento' => 'nullable|string',
            'tipo_bloqueo' => 'nullable|string',
            'factores_riesgo' => 'nullable|array',
            'fecha_termino' => 'nullable|date', // Nuevo campo
            'activo' => 'boolean|default:true', // Nuevo campo
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 400);
        }

        $input = $validator->validated();
        $paciente = Paciente::create($input);

        return response()->json([
            'success' => true,
            'message' => "Paciente creado con éxito",
            "data" => $paciente
        ]);
    }

    public function show($id)
    {
        // Obtener un paciente específico por ID
        $paciente = Paciente::findOrFail($id);
        return new PacienteResource($paciente);
    }

    public function update(Request $request, $id)
    {
        // Encontrar el paciente por ID
        $paciente = Paciente::findOrFail($id);

        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'rol' => 'required|unique:pacientes,rol,' . $paciente->id,
            'nombre' => 'required',
            'edad' => 'required|integer',
            'rut' => 'required',
            'prevision' => 'required',
            'cama_hospitalizacion' => 'required',
            'diagnostico' => 'required',
            'cirujano' => 'required',
            'cirugia' => 'required',
            'tratamiento_modalidad' => 'nullable|string',
            'tratamiento_medicamento' => 'nullable|string',
            'tipo_bloqueo' => 'nullable|string',
            'factores_riesgo' => 'nullable|array',
            'fecha_termino' => 'nullable|date',
            'activo' => 'boolean',
        ]);

        // Actualizar el paciente con los datos validados
        $paciente->update($validatedData);

        // Retornar el recurso actualizado
        return new PacienteResource($paciente);
    }

    public function terminarTratamiento($id)
    {
        // Encontrar el paciente por ID
        $paciente = Paciente::findOrFail($id);

        // Marcar el tratamiento como terminado
        $paciente->update([
            'fecha_termino' => now(), // Establece la fecha actual como fecha de término
            'activo' => false,        // Marca el paciente como inactivo
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Tratamiento terminado con éxito',
            'data' => new PacienteResource($paciente)
        ]);
    }

    public function destroy($id)
    {
        // Eliminar un paciente por ID
        Paciente::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}