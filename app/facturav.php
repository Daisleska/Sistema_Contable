<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturav extends Model
{
    protected $table='facturav';

    protected $fillable=['n_factura', 'fecha', 'id_clientes', 'id_productos', 'domicilio', 'f_pago', 'cantidad', 'importe', 'sub_total', 'total'];

   
}

