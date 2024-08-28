<?php

use App\Http\Controllers\Api\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::Resource('pacientes', PacienteController::class);

Route::put('pacientes/{id}/terminar-tratamiento', [PacienteController::class, 'terminarTratamiento']);