<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('departamento')->insert([
            
            
            'tipo' => 'Despacho',
            'nombre' => 'Superintendencia'


          
        ]);


        \DB::table('departamento')->insert([
            
           'tipo' => 'Gerencia',
            'nombre' => 'Fiscalización'
          
        ]);
    }
}
