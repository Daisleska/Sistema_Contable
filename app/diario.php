<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diario extends Model
{
    protected $table='diario';

    protected $fillable=['fecha', 'cuenta', 'referencia', 'debe', 'haber'];

}
