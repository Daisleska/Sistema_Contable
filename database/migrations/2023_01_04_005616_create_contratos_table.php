<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empleado_id');
             $table->text('tarea');
             $table->date('fecha');
             $table->date('fecha_inicio');
             $table->date('fecha_final');
             $table->enum('status',['Activo','Vencido'])->default('Activo');
             $table->string('cargo');
             $table->text('area');
            $table->string('adscripcion');
            $table->foreign('empleado_id')->references('id')->on('empleado')->onDelete('cascade');
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
        Schema::dropIfExists('contratos');
    }
}
