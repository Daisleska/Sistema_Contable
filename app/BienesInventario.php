<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BienesInventario extends Model
{
    protected $table='bienesinventario';

    protected $fillable=['fecha', 'departamento_id', 'bienes_id', 'status'];
}
