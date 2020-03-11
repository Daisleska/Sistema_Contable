<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
     protected $table='productos';

    protected $fillable=['codigo','nombre','descripcion','precio'];
}
