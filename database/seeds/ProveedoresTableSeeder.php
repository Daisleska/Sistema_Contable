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
       		'tipo_documento' => 'j',
       		'codigo' => 12345678,
       		'nombre' => 'EICHE',
            'correo' => 'eiche@gmail.com',
            'direccion' => 'chile',
            'telefono' => '0212222222'
       	]);
        \DB::table('proveedores')->insert([
          'tipo_documento' => 'j',
          'codigo' => 125678,
          'nombre' => 'EICHE',
            'correo' => 'eihe@gmail.com',
            'direccion' => 'chile',
            'telefono' => '0212222222'
        ]);
        \DB::table('proveedores')->insert([
          'tipo_documento' => 'j',
          'codigo' => 145678,
          'nombre' => 'EICE',
            'correo' => 'ehe@gmail.com',
            'direccion' => 'chile',
            'telefono' => '0212222222'
        ]);
    }
}
