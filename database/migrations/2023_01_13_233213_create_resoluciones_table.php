<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resoluciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('n_resolucion');
            $table->unsignedBigInteger('empleado_id');
            $table->enum('status',['Activo','Suspendido'])->default('Activo');
            $table->string('cargo');
            $table->string('adscripcion');
            $table->string('condicion')->nullable();
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
        Schema::dropIfExists('resoluciones');
    }
}
