<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Depositogracca extends Model
{
    
    static $rules = [
    ];
    protected $perPage = 20;
    protected $table = 'depositograccas';
    protected $fillable = ['guia','numeroFactura','producto','modelo','partCode','codigoAlternativo','partName','descripcion','cantidad','origen'];

    public function producto(){
        return $this->belongsTo(Producto::class, 'id');
    }



}
