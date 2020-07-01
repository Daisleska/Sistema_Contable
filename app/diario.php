<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diario extends Model
{
    protected $table='diario';

    protected $fillable=['id','n_folio','anio','estado'];

}


