<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaHasDiarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_has_diario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cuenta_id');
            $table->unsignedBigInteger('diario_id');
            $table->string('de_cuentas');
            $table->string('a_cuentas');
            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('cascade');
            $table->foreign('diario_id')->references('id')->on('diario')->onDelete('cascade');
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
        Schema::dropIfExists('cuenta_has_diario');
    }
}
