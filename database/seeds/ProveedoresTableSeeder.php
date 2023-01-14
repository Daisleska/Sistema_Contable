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

          'nombre' => 'Faboca C.A',
       		'tipo_documento' => 'J',
       		'ruf' => 12345678,
       		'representante' => 'Pablo',
            'direccion' => 'Maracay, edo Aragua',
            'correo' => 'camisasfaboca@gmail.com',
            'codigo' => '58',
            'telefono' => '0243222222'
       	]);
        \DB::table('proveedores')->insert([

          'nombre' => 'Diseños y Papeleria, C.A',
          'tipo_documento' => 'J',
          'ruf' => 1256782,
           'representante' => 'Cesar',
            'correo' => 'diseñospapel@gmail.com',
            'direccion' => 'Las Delicias, Aragua.',
            'codigo' => '58',
            'telefono' => '0243222222'
        ]);

    }
}
