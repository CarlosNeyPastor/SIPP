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
        Schema::create('event23s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            $table->String('unidad_policial')->nullable();
            $table->String('fiscalia')->nullable();
            $table->String('tipo_hecho')->nullable();
            $table->String('solicitante')->nullable();
            $table->String('lugar')->nullable();
            $table->String('ampliacion',20)->nullable();
            $table->text('perito')->nullable();
            $table->text('receptor')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('event23s');
    }
};
