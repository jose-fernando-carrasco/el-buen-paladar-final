<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->smallInteger('monto');
            $table->integer('nit')->nullable();

            $table->unsignedBigInteger('cuenta_id')->unique()->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();

            $table->foreign('cuenta_id')->references('id')->on('cuentas')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
