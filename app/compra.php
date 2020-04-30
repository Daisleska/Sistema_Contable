<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    protected $table='compra';

    protected $fillable=['facturac_id','proveedores_id'];

}
