<?php

use Illuminate\Database\Seeder;

class UsuariosPrivilegiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //--- Privilegio del usuario con ID 1 - Administrador ------------------//
        for ($i=1; $i <=42; $i++) { 
        	\DB::table('usuarios_has_privilegios')->insert([
        	'id_usuario' => 1,
        	'id_privilegio' => $i
            ]);
        }
        

        //--- Privilegio del usuario con ID 2 - Contador -----------//

        for ($i=1; $i <= 16; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 2,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
        }
        for ($i=17; $i <= 38; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 2,
            'id_privilegio' => $i,
            ]);
        }

         for ($i=39; $i <= 41; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 2,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
        }

        \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 2,
            'id_privilegio' => 42,
            ]);

        

        //--- Privilegio del usuario con ID 3 - Jefe --//-------------


            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 1,
            ]);

            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 5,
            ]);

            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 7,
            ]);

            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 11,
            ]);
    
        for ($i=16; $i <= 21; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            ]);
        }

       
        for ($i=24; $i <= 29; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            ]);
        }

         for ($i=33; $i <= 34; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            ]);
        }

        \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 36,
            ]);



       


        
//---------------------------------------------SUPER USER EICHE--------------
        for ($i=1; $i <=42; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 4,
            'id_privilegio' => $i
            ]);
        }
    }
}
