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
       		'tipo_documento' => 'V',
            'cedula' => '25897654',
       		'nombre' => 'Santiago',
            'email' => 'santiago02@gmail.com',
            'direccion' => 'Cagua',
            'telefono' => '0412786768',
            
          
       	]);
    }
}
