<?php

use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('empleado')->insert([
            
            
            
            'nombres' => 'Elliot Joshep',
            'apellidos' => 'Stible',
            'tipo_doc' => 'V',
            'cedula' => '11897654',
            'fecha_nac' => '1972-04-12',
            'sexo' => 'Masculino',
            'estado_civil' => 'Soltero',
            'tipo_personal' => 'Alto Nivel',
            'cargo' => 'Gerente',
            'adscripcion' => 'Gerencia de Fiscalización',
            'fecha_ingreso' => '2022-06-17',
            'direccion' => 'Maracay, Aragua'




          
        ]);

         \DB::table('empleado')->insert([
            
            
            
            'nombres' => 'Victoria Akseliad',
            'apellidos' => 'Vilera Vizcaino',
            'tipo_doc' => 'V',
            'cedula' => '28496463',
            'fecha_nac' => '2000-05-25',
            'sexo' => 'Femenino',
            'estado_civil' => 'Soltero',
            'tipo_personal' => 'Contratado',
            'cargo' => 'Asistente',
            'adscripcion' => 'Despacho de la Superintendencia',
            'fecha_ingreso' => '2022-01-03',
            'direccion' => 'La Victoria, Aragua'


            ]);
    }
}
