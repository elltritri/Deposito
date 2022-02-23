<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Facturas extends Migration
{
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('guia')->nullable();
            $table->string('numeroFactura')->nullable();
            $table->string('producto')->nullable();
            $table->string('modelo')->nullable();
            $table->string('lote')->nullable();
            
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}

