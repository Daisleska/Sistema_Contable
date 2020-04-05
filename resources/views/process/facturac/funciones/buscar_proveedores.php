<?php

	use App\proveedor;

	$proveedor=DB::table ('proveedores')->select('nombre','id', 'ruf')->where('ruf', $id )->get();


foreach ($proveedor as $key) {

echo e($key->nombre); 
    }
?>