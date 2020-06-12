<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mayor extends Model
{
   protected $table='mayor';

    protected $fillable=['id','cuenta_id','debe','haber'];
}
