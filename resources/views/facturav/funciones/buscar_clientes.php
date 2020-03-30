<?php

	use App\cliente;

	$cliente=DB::table ('clientes')->select('nombre','id', 'ruf')->where('ruf', $id )->get();


foreach ($cliente as $key) {

echo e($key->nombre); 
    }
?>