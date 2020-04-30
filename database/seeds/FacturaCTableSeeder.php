<?php

use Illuminate\Database\Seeder;

class FacturaCTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('facturac')->insert([

          'n_factura' => '0000001',
          'fecha' => '2020-04-12',
          'domicilio' => 'argentina buenos aires',
          'f_pago' => 'efectivo',
          'cantidad' => '12',
          'importe' => 10,
          'sub_total' => 95,
          'total' => 100,
          'n_control' => '230013',
          'proveedores_id' => 1,
          'productos_id' =>1
         
        ]);
    }
}
