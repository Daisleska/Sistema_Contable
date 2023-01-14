<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarioBienes extends Model
{
   protected $table='inventariobienes';

    protected $fillable=['fecha', 'empleado_id', 'bienes_id', 'status'];


  
}
