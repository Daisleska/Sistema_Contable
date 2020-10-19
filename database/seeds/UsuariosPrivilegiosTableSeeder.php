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
        //--- Privilegio del usuario con Administrador ------------------//

        for ($i=1; $i <=42; $i++) { 
        	\DB::table('usuarios_has_privilegios')->insert([
        	'id_usuario' => 1,
        	'id_privilegio' => $i
            ]);
        }

          //--- Privilegio del usuario con - Contador -----------//
        

       

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
            'id_privilegio' => $i
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
            'id_privilegio' => 42
            ]);


        //--- Privilegio del usuario con - Jefe --//-------------
     
      


            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 1
            ]);

            for ($i=2; $i <= 4; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
            }

            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 5
            ]);

            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 6,
            'status' => 'No'
            ]);

            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 7
            ]);


            for ($i=8; $i <= 10; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
            }

            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 11
            ]);


            for ($i=12; $i <= 15; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
            }
    
        for ($i=16; $i <= 21; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i
            ]);
        }


        for ($i=22; $i <= 23; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
        }

       
        for ($i=24; $i <= 29; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i
            ]);
        }


        for ($i=30; $i <= 32; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
            }

         for ($i=33; $i <= 34; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i
            ]);
        }

       
        \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 35,
            'status' => 'No'
            ]);

        \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => 36
            ]);


        for ($i=37; $i <= 42; $i++) { 
            \DB::table('usuarios_has_privilegios')->insert([
            'id_usuario' => 3,
            'id_privilegio' => $i,
            'status' => 'No'
            ]);
            }


  
       


        
//---------------------------------------------SUPER USER EICHE--------------
    
       
    }
}