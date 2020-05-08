<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cotizacion extends Model
{
    protected $table='cotizaciones';

    protected $fillable=['n_cotizacion', 'fecha', 'id_clientes', 'id_productos', 'c_pago', 'validez', 'cantidad', 'importe', 'sub_total', 'descuento', 'iva','total'];

}
