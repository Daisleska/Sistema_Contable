<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type',['Admin','Contador','Jefe']);
            $table->string('Empresa')->default('EICHE');
            $table->enum('status',['Activo','Suspendido'])->default('Activo');
            $table->string('avatar')->default('avatar-1.jpg');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');

/*        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('avatar');
        });*/
    }
}