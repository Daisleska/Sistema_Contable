<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuenta extends Model
{
 protected $table='cuentas';

    protected $fillable=['codigo','nombre','descripcion','tipo', 't_cuenta', 'saldo'];
}

