<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturac extends Model
{
    protected $table='facturac';

    protected $fillable=['n_factura', 'fecha', 'id_proveedores', 'id_productos', 'domicilio', 'f_pago', 'cantidad', 'importe', 'sub_total', 'total'];
}
