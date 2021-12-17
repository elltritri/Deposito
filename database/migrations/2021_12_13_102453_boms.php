<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Boms extends Migration
{
    public function up()
    {
        Schema::create('boms', function (Blueprint $table) {
            $table->id();
            $table->string('guia')->nullable();
            $table->string('numeroFactura')->nullable();
            $table->string('partCode')->nullable();
            $table->string('codigoAlternativo')->nullable();
            $table->string('partName')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('origen')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('boms');
    }
}
