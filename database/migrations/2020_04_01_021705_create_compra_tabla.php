<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('facturac_id');
            $table->unsignedBigInteger('proveedores_id');

            $table->foreign('facturac_id')->references('id')->on('facturac')->onDelete('cascade');
            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade');

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
        Schema::dropIfExists('compra');
    }
}
