<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEntregaAlmuerzoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('entrega_almuerzo', function (Blueprint $table) {
            $table->bigInteger('codigo');
            $table->datetime('fecha');
            $table->foreign('codigo')->references('codigo')->on('users')->onDelete('cascade');
            
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
        //
    }
}
