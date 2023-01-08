<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('cargos')->insert([
            
            'nombre' => 'Gerente',
            'tipo' => 'Alto Nivel'
            
          
        ]);


        \DB::table('cargos')->insert([
            
            'nombre' => 'Asistente',
            'tipo' => 'Contratado'
            
          
        ]);
    }
}
