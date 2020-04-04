<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    protected $table='compra';

    protected $fillable=['id_facturac','id_provedores'];

}
