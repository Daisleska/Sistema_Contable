<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
     protected $table='proveedores';

    protected $fillable=['nombre', 'tipo_documento','ruf','representante','correo','direccion', 'telefono'];
}

