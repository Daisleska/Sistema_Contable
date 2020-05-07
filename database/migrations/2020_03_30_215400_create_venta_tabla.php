<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('facturav_id');
            $table->unsignedBigInteger('clientes_id');

            $table->foreign('facturav_id')->references('id')->on('facturav')->onDelete('cascade');
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('venta');
    }
}
