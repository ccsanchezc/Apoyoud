<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigInteger('codigo');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email',100)->unique();
            $table->string('password');
            $table->bigInteger('telefono');
            $table->string('direccion');
            $table->string('carrera');
            $table->enum('type',['estudiante','supervisor','admin'])->default('estudiante');
            $table->integer('sub_id')->unsigned();
            $table->integer('Servi_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->primary('codigo');

            $table->foreign('Sub_id')->references('id')->on('subsidio')->onDelete('cascade');
            $table->foreign('Servi_id')->references('id')->on('serviciosocial')->onDelete('cascade');
           
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
