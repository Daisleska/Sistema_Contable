<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('clientes')->insert([
            
            'nombre' => 'Santiago',
       		'tipo_documento' => 'V',
            'ruf' => '25897654',
            'email' => 'santiago02@gmail.com',
            'direccion' => 'Cagua',
            'codigo' => '+58',
            'telefono' => '0412786768',
            
          
       	]);
    }
}
