<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bienes extends Model
{
    protected $table='bienes';
    protected $fillable=['nombre','codigo','cantidad', 'grupo', 'sub_grupo','sec', 'valor_u'];



      public function InventarioBienes()
    {
        return $this->belongsToMany('App\InventarioBienes','inventariobienes','bienes_id','empleado_id')->withPivot('amount');
    }



      public function BienesInventario()
    {
        return $this->belongsToMany('App\BienesInventario','bienesinventario','bienes_id','departamento_id')->withPivot('amount');
    }
}
