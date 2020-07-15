<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
   protected $table='clientes';

    protected $fillable=['nombre','tipo_documento'.'ruf', 'email','direccion','codigo','telefono'];


    public function producto()
    {
    	return $this->belongsToMany('App\producto','facturav','clientes_id','productos_id')->withPivot('amount');
    }


}

