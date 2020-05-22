<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiarioTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('descripcion')->nullable();
            $table->integer('monto');
            $table->enum('debe_haber',['debe','haber']);
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
        Schema::dropIfExists('diario');
    }
}
