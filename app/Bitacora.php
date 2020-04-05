<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
	protected $table='bitacora';
    protected $fillable = [
        'user', 'lastname', 'role', 'action', 
    ];

}
