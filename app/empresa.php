<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
   protected $table='empresa';

    protected $fillable=['nombre','tipo_documento'.'rif', 'email','direccion','codigo'.'telefono', 'decreto_max_auto', 'slogan', 'image_name','url_image','page_foot'];

}
