<?php

use Illuminate\Database\Seeder;

class PrivilegiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//registros generales


        // ID 1
        \DB::table('privilegios')->insert([
        	'modulo' => 'Registros Generales',
        	'privilegio' => 'Listado'
        ]);

        // ID 2
        \DB::table('privilegios')->insert([
        	'modulo' => 'Registros Generales',
        	'privilegio' => 'Registrar'
        ]);

        //ID 3
        \DB::table('privilegios')->insert([
        	'modulo' => 'Registros Generales',
        	'privilegio' => 'Modificar'
        ]);

        //ID 4
        \DB::table('privilegios')->insert([
        	'modulo' => 'Registros Generales',
        	'privilegio' => 'Eliminar'
        ]);

        //Facturas
        //ID 5
        \DB::table('privilegios')->insert([
        	'modulo' => 'Facturas',
        	'privilegio' => 'Ver'
        ]);

        //ID 6
        \DB::table('privilegios')->insert([
        	'modulo' => 'Facturas',
        	'privilegio' => 'Registrar'
        ]);

        //ID 7
        \DB::table('privilegios')->insert([
            'modulo' => 'Facturas',
            'privilegio' => 'Listado'
        ]);

        //ID 8
        \DB::table('privilegios')->insert([
        	'modulo' => 'Facturas',
        	'privilegio' => 'Modificar'
        ]);

        //ID 9

        \DB::table('privilegios')->insert([
        	'modulo' => 'Facturas',
        	'privilegio' => 'Eliminar'
        ]);

        //usuarios

        //ID 10
        \DB::table('privilegios')->insert([
            'modulo' => 'Usuarios',
            'privilegio' => 'Cambiar estado'
        ]);

        //ID 11
        \DB::table('privilegios')->insert([
            'modulo' => 'Usuarios',
            'privilegio' => 'Listado'
        ]);

        //ID 12
        \DB::table('privilegios')->insert([
            'modulo' => 'Usuarios',
            'privilegio' => 'Registrar'
        ]);

        //ID 13
        \DB::table('privilegios')->insert([
            'modulo' => 'Usuarios',
            'privilegio' => 'Modificar'
        ]);

        //ID 14
        \DB::table('privilegios')->insert([
            'modulo' => 'Usuarios',
            'privilegio' => 'Eliminar'
        ]);

        //ID 15

        \DB::table('privilegios')->insert([
            'modulo' => 'Usuarios',
            'privilegio' => 'cambiar tipo usuario'
        ]);
        //--------------------------------ID 16
        \DB::table('privilegios')->insert([
            'modulo' => 'Bitacora',
            'privilegio' => 'Ver'
        ]);

        //------------------------------- ID 17

        \DB::table('privilegios')->insert([
            'modulo' => 'ayuda',
            'privilegio' => 'Ver'
        ]);




        //Gráficas
        //ID 18
        \DB::table('privilegios')->insert([
            'modulo' => 'Graficas',
            'privilegio' => 'Ver'
        ]);

        //Reportes
        //ID 19
        \DB::table('privilegios')->insert([
            'modulo' => 'Reportes',
            'privilegio' => 'Excel'
        ]);

        //ID 20
        \DB::table('privilegios')->insert([
            'modulo' => 'Reportes',
            'privilegio' => 'PDF'
        ]);

        //Libros Principales

        //ID 21
        \DB::table('privilegios')->insert([
            'modulo' => 'Inventario',
            'privilegio' => 'Ver'
        ]);

        //ID 22
        \DB::table('privilegios')->insert([
            'modulo' => 'Diario',
            'privilegio' => 'Registrar'
        ]);

        //ID 23
        \DB::table('privilegios')->insert([
            'modulo' => 'Diario',
            'privilegio' => 'Cerrar o Abrir'
        ]);

        //ID 24
        \DB::table('privilegios')->insert([
            'modulo' => 'Diario',
            'privilegio' => 'Ver'
        ]);

        //ID 25
        \DB::table('privilegios')->insert([
            'modulo' => 'Diario',
            'privilegio' => 'Historial'
        ]);

        //ID 26
        \DB::table('privilegios')->insert([
            'modulo' => 'Mayor',
            'privilegio' => 'Ver'
        ]);

        //ID 27
        \DB::table('privilegios')->insert([
            'modulo' => 'Mayor',
            'privilegio' => 'Historial'
        ]);

        //Otros Libros

        //ID 28
        \DB::table('privilegios')->insert([
            'modulo' => 'Compra Venta',
            'privilegio' => 'Ver'
        ]);

        //ID 29
        \DB::table('privilegios')->insert([
            'modulo' => 'Caja Chica',
            'privilegio' => 'Listado'
        ]);

        //ID 30
        \DB::table('privilegios')->insert([
            'modulo' => 'Caja Chica',
            'privilegio' => 'Ingreso'
        ]);

        //ID 31
        \DB::table('privilegios')->insert([
            'modulo' => 'Caja Chica',
            'privilegio' => 'Egreso'
        ]);

        //ID 32
        \DB::table('privilegios')->insert([
            'modulo' => 'Caja Chica',
            'privilegio' => 'Busqueda'
        ]);

        //----BALANCES------ID 33
        \DB::table('privilegios')->insert([
            'modulo' => 'Balances',
            'privilegio' => 'Historial'
        ]);

        //ID 34
        \DB::table('privilegios')->insert([
            'modulo' => 'Balances',
            'privilegio' => 'Ver'
        ]);

        //ID 35
        \DB::table('privilegios')->insert([
            'modulo' => 'Balances',
            'privilegio' => 'Completar'
        ]);

        //Cotizaciones----------------------------

        //ID 36
        \DB::table('privilegios')->insert([
            'modulo' => 'Cotizaciones',
            'privilegio' => 'Listado'
        ]);
        //ID 37
        \DB::table('privilegios')->insert([
            'modulo' => 'Cotizaciones',
            'privilegio' => 'Eliminar'
        ]);
        //ID 38
        \DB::table('privilegios')->insert([
            'modulo' => 'Cotizaciones',
            'privilegio' => 'Registrar'
        ]);

        //Empresa
        //ID 39
        \DB::table('privilegios')->insert([
            'modulo' => 'Empresa',
            'privilegio' => 'Registrar'
        ]);
        //ID 40
        \DB::table('privilegios')->insert([
            'modulo' => 'Empresa',
            'privilegio' => 'Modificar'
        ]);

        //Configuracion
        //ID 41
        \DB::table('privilegios')->insert([
            'modulo' => 'Configuracion',
            'privilegio' => 'Data Base'
        ]);

        //Mi cuenta
        //ID 42
        \DB::table('privilegios')->insert([
            'modulo' => 'Mi cuenta',
            'privilegio' => 'Ver - Canmbiar'
        ]);



    }
}
