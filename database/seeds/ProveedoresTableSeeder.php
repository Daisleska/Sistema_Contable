<?php

use Illuminate\Database\Seeder;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('proveedores')->insert([

          'nombre' => 'EICHE',
       		'tipo_documento' => 'j',
       		'ruf' => 12345678,
       		'representante' => 'Pablo',
            'direccion' => 'chile',
            'correo' => 'eiche@gmail.com',
            'telefono' => '0212222222'
       	]);
        \DB::table('proveedores')->insert([

          'nombre' => 'EICHE',
          'tipo_documento' => 'j',
          'ruf' => 125678,
           'representante' => 'Cesar',
            'correo' => 'eihe@gmail.com',
            'direccion' => 'chile',
            'telefono' => '0212222222'
        ]);
        
    }
}
