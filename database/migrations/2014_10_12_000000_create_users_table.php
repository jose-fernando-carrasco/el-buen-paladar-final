<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');

            $table->date('fecha_de_nacimiento')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('dirreccion')->nullable();
            $table->string('nit')->nullable();
            $table->string('ci')->nullable();  /* Gerente|Cajero */
            $table->string('profesion')->nullable(); /* Cajero */
            $table->string('estado')->nullable();   /* Cliente */


            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->string('type')->nullable(); /* Tipo */

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
    }
}
