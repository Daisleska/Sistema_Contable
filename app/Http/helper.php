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

function utilidad_neta($monto)
{ 
   $fecha_mes= date('m');
   $fecha_anio= date('Y');
   $u= \DB::select('SELECT * FROM utilidad WHERE MONTH(fecha)='.$fecha_mes.' AND YEAR(fecha)='.$fecha_anio);

   if (empty($u)) {
   	#registrar
   	$fecha_completa= date('Y-m-d');
   	$registrar= \DB::select ('INSERT INTO utilidad ( `cantidad`, `fecha`) VALUES ("'.$monto.'","'.$fecha_completa.'")');
   }
}
