<?php

   use App\proveedor;

	$proveedores=DB::table ('proveedores')->select('id', 'ruf')->where('ruf', $proveedor)->get();

    foreach ($proveedores as $key) {

echo e($key->id); 
    }
?>