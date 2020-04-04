<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
     protected $table='venta';

    protected $fillable=['id_facturav','id_clientes'];

}
