<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentoMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_menu', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('cantidad');

            $table->unsignedBigInteger('alimento_id');
            $table->unsignedBigInteger('menu_id');

            $table->timestamps();

            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimento_menu');
    }
}
