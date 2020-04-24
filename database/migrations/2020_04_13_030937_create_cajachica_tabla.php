<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajachicaTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajachica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('ingresos');
            $table->string('egresos');
            $table->string('saldo');

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
        Schema::dropIfExists('cajachica');
    }
}
