<?php
date_default_timezone_set('UTC');

function buscar_p($modulo,$privilegio)
{
	$hallado="No";
	$privilegio=App\Privilegios::where('privilegio',$privilegio)->where('modulo',$modulo)->first();
	foreach ($privilegio->usuarios as $key) {
		
		if ($key->pivot->id_usuario==\Auth::user()->id) {
			$hallado=$key->pivot->status;
		}
	}
	return $hallado;
}

