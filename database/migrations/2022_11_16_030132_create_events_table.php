<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            //$table->date('fecha');//ver default para fecha asi toma siempre la del dia
            $table->String('unidad_policial')->nullable();
            $table->String('fiscalia')->nullable();
            $table->String('tipo_hecho')->nullable();
            $table->String('solicitante')->nullable();
            $table->String('lugar')->nullable();
            $table->String('ampliacion',20)->nullable();
            $table->text('perito')->nullable();
            $table->text('fotografo')->nullable();
            $table->integer('contactos')->nullable();
            $table->integer('hojas')->nullable();
            $table->text('receptor')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            //$table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('modified_by')->references('id')->on('users');             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
