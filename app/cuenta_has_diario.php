<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuenta_has_diario extends Model
{
 protected $table='cuenta_has_diario';

    protected $fillable=['id','fecha', 'descripcion', 'n_asiento', 'diario_id','cuenta_id', 'c_destino', 'de_monto','a_monto'];
}
