<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturac', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('n_factura');
            $table->date('fecha');
            $table->unsignedBigInteger('proveedores_id');
            $table->unsignedBigInteger('productos_id');
            $table->string('domicilio')->nullable();
            $table->string('f_pago')->nullable();
            $table->integer('cantidad');
            $table->integer('importe');
            $table->integer('sub_total');
            $table->integer('iva');
            $table->integer('p_iva');
            $table->integer('total');
            $table->integer('n_control');
            $table->enum('divisas', ['VEF', 'USD' , 'EUR', 'CLP'])->default('USD');

            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade');
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
        Schema::dropIfExists('facturac');
    }
}
