<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('tipo_doc');
            $table->string('cedula')->unique();
            $table->date('fecha_nac');
            $table->string('sexo');
            $table->string('estado_civil');
            $table->string('tipo_personal');
            $table->string('cargo');
            $table->string('adscripcion');
            $table->date('fecha_ingreso');
            $table->string('direccion');
            $table->enum('status',['Activo','Suspendido'])->default('Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
