<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /* */
       /* $this->call(EmpresaTableSeeder::class);*/
        /*
        /*$this->call(FacturaCTableSeeder::class);*/
        /*$this->call(ProductosTableSeeder::class);*/
        $this->call(IvaTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(DescuentoTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PrivilegiosTableSeeder::class);
        $this->call(UsuariosPrivilegiosTableSeeder::class);
        /**$this->call(CargosTableSeeder::class);
        $this->call(EmpleadosTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);*/
    }
}
