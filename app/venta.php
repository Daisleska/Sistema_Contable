<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
     protected $table='venta';

    protected $fillable=['facturav_id','clientes_id'];

}
