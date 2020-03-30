<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturavTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturav', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('n_factura');
            $table->date('fecha');
            $table->unsignedBigInteger('clientes_id');
            $table->unsignedBigInteger('productos_id');
            $table->string('domicilio')->nullable();
            $table->string('f_pago')->nullable();
            $table->integer('cantidad');
            $table->integer('importe');
            $table->integer('sub_total');
            $table->integer('total');

            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');

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
        Schema::dropIfExists('facturav');
    }
}
