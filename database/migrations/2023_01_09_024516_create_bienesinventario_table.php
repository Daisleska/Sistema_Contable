<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBienesinventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienesinventario', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->date('fecha');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('bienes_id');
            $table->enum('status',['Activo','Suspendido'])->default('Activo');

            $table->foreign('departamento_id')->references('id')->on('departamento')->onDelete('cascade');
            $table->foreign('bienes_id')->references('id')->on('bienes')->onDelete('cascade');
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
        Schema::dropIfExists('bienesinventario');
    }
}
