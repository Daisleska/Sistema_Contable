<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturav extends Model
{
    protected $table='facturav';

    protected $fillable=['n_factura', 'fecha', 'id_clientes', 'id_productos', 'n_control', 'domicilio', 'f_pago', 'divisa', 'cantidad', 'importe', 'sub_total', 'iva', 'p_iva', 'total'];
   

    public function venta()
    {
        return $this->belongsToMany('App\venta','venta','facturav_id','id')->withPivot('amount');
    }
}

