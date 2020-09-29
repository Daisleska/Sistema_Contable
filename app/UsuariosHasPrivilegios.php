<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosHasPrivilegios extends Model
{
    protected $table='usuarios_has_privilegios';

    protected $fillable=['id_usuario','id_privilegio','status'];

    public function usuario()
	  {
	  	return $this->belongsTo('App\User','id_usuario','id');
	  }

	public function privilegio()
	  {
	  	return $this->belongsTo('App\Privilegios','id_privilegio','id');
	  }

}
