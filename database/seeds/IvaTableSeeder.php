<?php

use Illuminate\Database\Seeder;

class IvaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('iva')->insert([

         
          'porcentaje' => 16
          
         
        ]);
    }
}
