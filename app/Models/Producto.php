<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    
    static $rules = [
		'Descripcion' => 'required',
    ];

    protected $perPage = 20;

  
    protected $fillable = ['Descripcion'];


    public function DepositoGracca()
    {
        return $this->hasMany(DepositoGracca::class, 'id');
    }
    public function Listadofactura()
    {
        return $this->hasMany(Listadofactura::class, 'id');
    }


}
