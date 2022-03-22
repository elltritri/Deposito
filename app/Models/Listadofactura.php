<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Listadofactura extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    protected $fillable = ['guia','numeroFactura','producto','modelo','partCode','codigoAlternativo','partName','descripcion','cantidad','origen'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'id');
    }

}
