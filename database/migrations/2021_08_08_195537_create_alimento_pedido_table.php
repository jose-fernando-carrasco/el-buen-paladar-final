<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentoPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimento_pedido', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('cantidad')->nullable();
            $table->smallInteger('precio')->nullable();

            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('alimento_id');



            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alimento_pedido');
    }
}
