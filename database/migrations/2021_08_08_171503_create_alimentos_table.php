<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id();

            $table->text('nombre');
            $table->string('imagen')->nullable();
            $table->text('descripcion');
            $table->integer('precio');
            $table->unsignedBigInteger('tipo_alimento_id')->nullable();
            $table->string('type');

            $table->foreign('tipo_alimento_id')->references('id')->on('tipo_alimentos')->onDelete('set null');

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
        Schema::dropIfExists('alimentos');
    }
}
