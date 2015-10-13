<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grupos', 255);
            $table->string('nome', 50);
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('cor', 30);
            $table->text('descricao');
            $table->float('quantidade', 15, 2);
            $table->string('unidade', 20);
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
        Schema::drop('products');
    }
}
