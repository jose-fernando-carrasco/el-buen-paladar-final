<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentoOfertaEspecialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_oferta_especial', function (Blueprint $table) {
            $table->id();

            

            $table->unsignedBigInteger('alimento_id');
            $table->unsignedBigInteger('oferta_especial_id');

            $table->timestamps();

            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade');
            $table->foreign('oferta_especial_id')->references('id')->on('oferta_especials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimento_oferta_especial');
    }
}
