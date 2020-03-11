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
       		'codigo' => 'AE007',
       		'nombre' => 'Pagina web',
            'descripcion' => 'Publicidad',
            'precio' => '200000',
          
       	]);
        
    }
}
