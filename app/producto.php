<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
     protected $table='productos';

    protected $fillable=['codigo','nombre','descripcion','existencia','unidad','precio','stock_min','stock_max'];

    

    public function cliente()
    {
    	return $this->belongsToMany('App\cliente','facturav','productos_id','clientes_id')->withPivot('amount');
    }


     public function proveedor()
    {
    	return $this->belongsToMany('App\proveedor','facturac','productos_id','proveedores_id')->withPivot('amount');
    }

     public function inventario()
    {
        return $this->belongsToMany('App\inventario','inventario','productos_id','facturac_id')->withPivot('amount');
    }
}
