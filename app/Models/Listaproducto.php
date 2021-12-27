<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Listaproducto
 *
 * @property $id
 * @property $numeroFactura
 * @property $producto
 * @property $modelo
 * @property $partCode
 * @property $codigoAlternativo
 * @property $partName
 * @property $cantidad
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Listaproducto extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numeroFactura','producto','modelo','partCode','codigoAlternativo','partName','cantidad'];



}
