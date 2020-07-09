<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cotizacion extends Model
{
    protected $table='cotizaciones';

    protected $fillable=['n_cotizacion', 'fecha', 'id_clientes', 'id_productos', 'c_pago', 'validez', 'cantidad', 'sub_total', 'descuento','ímporte','p_des','divisa', 'total','comentarios', 'address_to', 'email_comments'];

}
