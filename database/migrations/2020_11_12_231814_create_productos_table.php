<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('categoria_id')->nullable();
            $table->integer('cliente_id')->nullable();
            $table->integer('conse')->nullable();
            $table->string('porque')->nullable();
            $table->string('Imagen');
            $table->string('Nombre');
            $table->string('Descripcion');
            $table->integer('Precio');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}
