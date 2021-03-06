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
            'codigo' => '58',
            'telefono' => '0212222222'
       	]);
        \DB::table('proveedores')->insert([

          'nombre' => 'EICHE',
          'tipo_documento' => 'j',
          'ruf' => 125678,
           'representante' => 'Cesar',
            'correo' => 'eihe@gmail.com',
            'direccion' => 'chile',
            'codigo' => '58',
            'telefono' => '0212222222'
        ]);

        \DB::table('proveedores')->insert([

          'nombre' => 'EICHE',
          'tipo_documento' => 'j',
          'ruf' => 1256787,
           'representante' => 'Cesar',
            'correo' => 'eihhe@gmail.com',
            'direccion' => 'chile',
            'codigo' => '58',
            'telefono' => '0342222222'
        ]);
        \DB::table('proveedores')->insert([

          'nombre' => 'EICHE',
          'tipo_documento' => 'j',
          'ruf' => 125988,
           'representante' => 'Cesar',
            'correo' => 'eihjje@gmail.com',
            'direccion' => 'chile',
            'codigo' => '58',
            'telefono' => '0212227222'
        ]);
        
    }
}
