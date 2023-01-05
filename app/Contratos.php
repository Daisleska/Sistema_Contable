<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    protected $table='contratos';
    protected $fillable=['n_control','empleado_id','tarea','fecha', 'fecha_inicio', 'fecha_final'];
}
