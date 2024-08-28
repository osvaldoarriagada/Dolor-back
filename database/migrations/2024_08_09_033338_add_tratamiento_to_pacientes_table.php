<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTratamientoToPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->string('tratamiento_modalidad')->nullable();
            $table->string('tratamiento_medicamento')->nullable();
            $table->string('tipo_bloqueo')->nullable();
            $table->json('factores_riesgo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropColumn('tratamiento_modalidad');
            $table->dropColumn('tratamiento_medicamento');
            $table->dropColumn('tipo_bloqueo');
            $table->dropColumn('factores_riesgo');
        });
    }
}