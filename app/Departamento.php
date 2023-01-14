<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamento';
    protected $fillable=['tipo','nombre'];




     public function BienesInventario()
    {
        return $this->belongsToMany('App\BienesInventario','bienesinventario','bienes_id','departamento_id')->withPivot('amount');
    }
}
