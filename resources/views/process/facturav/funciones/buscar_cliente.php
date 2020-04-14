<?php
   use App\cliente;

	$clientes=DB::table ('clientes')->select('id', 'ruf','nombre')->where('ruf', $cliente)->get();

    foreach ($clientes as $key) {

echo e($key->id); 
    }
?>