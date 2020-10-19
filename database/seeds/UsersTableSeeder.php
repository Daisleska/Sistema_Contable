<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
       		'name' => 'Hector hernandez',
       		'email' => 'hectorher149@gmail.com',
       		'password' => bcrypt('123456'),
          'user_type' => 'Administrador',
          'avatar' => '1_1584161024.jpg'
       	]);  



         \DB::table('users')->insert([
          'name' => 'Daisleska Vilera',
          'email' => 'dvilera610@gmail.com',
          'password' => bcrypt('Dailes20'),
          'user_type' => 'Contador',
          'avatar' => '1_1586365399.jpg'
        ]); 



        \DB::table('users')->insert([
         'name' => 'Rodolfo Silva',
         'email' => 'rodosilva@gmail.com',
         'password' => bcrypt('12345'),
         'user_type' => 'Jefe',
          'avatar' => 'FB_IMG_16001323602758190.jpg'
        ]); 


         
    }


}


//


//


//








//


//

