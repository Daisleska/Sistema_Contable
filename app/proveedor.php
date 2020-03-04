<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
     protected $table='proveedores';

    protected $fillable=['tipo_documento'.'codigo','nombre','correo','direccion','telefono'];
}
