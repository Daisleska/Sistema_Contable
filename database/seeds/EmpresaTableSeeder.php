<?php

use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('empresa')->insert([
            
            
            
            'nombre' => 'Servicio Tributario de Aragua (SETA)',
            'tipo_documento' => 'G',
            'rif' => '200089202',
            'email' => 'serviciotributarioaragua@gmail.com',
            'direccion' => 'Av. 10 de diciembre, entre calle Junín con Av. Sucre',
            'codigo' => 58,
            'telefono' => 02432336565,
            'decreto_max_auto' => 'Decreto N° 4.264, publicado en Gaceta Oficial del estado Aragua, en fecha 20 de diciembre de 2021',
            'slogan' => '¡Chávez Vive! ¡Eficiencia o Nada! ¡Humanidad, Esperanza y Futuro!',
            'image_namea' => 'seta.png',
            'url_image' => '/images/seta.png',
            'page_foot' => 'Av. 10 de diciembre entre calle Junín con Av. Sucre'




          
        ]);
    }
}
