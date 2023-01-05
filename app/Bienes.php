<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bienes extends Model
{
    protected $table='bienes';
    protected $fillable=['nombre','codigo','cantidad', 'grupo', 'sub_grupo','sec', 'valor_u'];
}
