<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('productos')->insert([

          'codigo' => 'AE04',
          'nombre' => 'Cinta Indicadora',
          'descripcion' => 'Rollo de 1/2" o 3/4" x 25-60 Yardas',
          'existencia' => 100,
          'unidad' => 'Individual',
          'precio' => '100000',
          'stock_min' => '10',
          'stock_max' => '100'
         
        ]);
          

        
    }
}
