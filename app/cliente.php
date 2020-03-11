<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
   protected $table='clientes';

    protected $fillable=['tipo_documento'.'cedula','nombre', 'email','direccion','telefono'];
}

