<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('n_cotizacion');
            $table->date('fecha');
            $table->unsignedBigInteger('clientes_id');
            $table->unsignedBigInteger('productos_id');
            $table->string('c_pago')->nullable();
            $table->integer('cantidad');
            $table->integer('importe');
            $table->string('validez');
            $table->integer('sub_total');
            $table->integer('descuento');
            $table->string('p_des');
/*          $table->integer('iva');
            $table->string('p_iva');*/
            $table->string('divisa');
            $table->integer('total');
            $table->string('comentarios')->nullable();
            $table->string('address_to');
            $table->string('email_comments')->nullable();


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
        Schema::dropIfExists('cotizaciones');
    }
}
