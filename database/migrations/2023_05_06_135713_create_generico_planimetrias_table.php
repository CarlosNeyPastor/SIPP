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
        Schema::create('generico_planimetrias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modified_by');
            
            $table->text('dibujante')->nullable();
            $table->String('unidad_policial')->nullable();
            $table->String('fiscaliaInt')->nullable();
            $table->String('tipo_hecho')->nullable();
            $table->String('origen')->nullable();
            $table->String('sgsp',20)->nullable();
            $table->String('lugar')->nullable();
            $table->text('tipo_trabajo')->nullable();
            $table->text('asunto')->nullable();
            $table->text('oficio')->nullable();
            $table->text('novedad')->nullable();
            $table->text('iue')->nullable();
            $table->text('exp_electronico')->nullable();
            $table->text('caracteristica')->nullable();
            $table->text('estado')->nullable();
            $table->text('visto_Bueno_planimetria')->nullable();
            $table->text('visto_Bueno_pericial')->nullable();
            $table->date('salida')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('receptor')->nullable();
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
        Schema::dropIfExists('generico_planimetrias');
    }
};
