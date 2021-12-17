<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class listaDepo extends Migration
{
    public function up()
    {
        Schema::create('listaDepo', function (Blueprint $table) {
            $table->id();
            $table->string('numeroFactura')->nullable();
            $table->string('partCode')->nullable();
            $table->string('codigoAlternativo')->nullable();
            $table->string('partName')->nullable();
            $table->integer('cantidad')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('listaDepo');
    }
}
