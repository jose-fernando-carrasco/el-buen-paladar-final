<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaEspecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_especials', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->enum('estado', [0,1])->default(0);
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta_especials');
    }
}
