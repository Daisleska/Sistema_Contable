<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resoluciones extends Model
{
    protected $table='resoluciones';
    protected $fillable=['n_resolucion','fecha', 'empleado_id', 'status', 'cargo', 'adscripcion', 'condicion'];
}
