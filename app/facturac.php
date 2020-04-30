<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturac extends Model
{
    protected $table='facturac';

    protected $fillable=['n_factura', 'fecha', 'id_proveedores', 'id_productos', 'domicilio', 'f_pago', 'cantidad', 'importe', 'sub_total', 'total', 'n_control'];

     public function inventario()
    {
        return $this->belongsToMany('App\inventario','inventario','facturac_id','productos_id')->withPivot('amount');
    }

    public function compra()
    {
        return $this->belongsToMany('App\compra','compra','facturac_id','id')->withPivot('amount');
    }
}

