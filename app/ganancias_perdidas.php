<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ganancias_perdidas extends Model
{
    protected $table='ganancias_perdidas';

    protected $fillable=['nombre','valor','fecha'];
}
