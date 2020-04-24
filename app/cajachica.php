<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cajachica extends Model
{
   protected $table='cajachica';

    protected $fillable=['fecha','ingresos', 'egresos', 'saldo'];

}
