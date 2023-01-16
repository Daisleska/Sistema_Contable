<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleado';

    protected $fillable=['nombres', 'apellidos', 'tipo_doc', 'cedula', 'fecha_nac', 'sexo', 'estado_civil', 'tipo_personal',  'cargo', 'adscripcion','fecha_ingreso', 'direccion','status', 'sueldo'];

  public function InventarioBienes()
    {
        return $this->belongsToMany('App\InventarioBienes','inventariobienes','bienes_id','empleado_id')->withPivot('amount');
    }

    
    }