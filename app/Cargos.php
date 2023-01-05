<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table='cargos';
    protected $fillable=['nombre','tipo'];
}
