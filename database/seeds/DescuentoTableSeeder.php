<?php

use Illuminate\Database\Seeder;

class DescuentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('descuento')->insert([

         
          'porcen' => 20
          
         
        ]);
    }
}
