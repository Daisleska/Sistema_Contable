<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $table='chat';

    protected $fillable=['usuario', 'mensaje', 'fecha', 'hora' ];
}
