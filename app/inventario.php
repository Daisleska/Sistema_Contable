<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table='inventario';

    protected $fillable=['existencia', 'costo_total', 'facturac_id', 'productos_id'];
}
