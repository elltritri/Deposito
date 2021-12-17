<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ListaDepo
 *
 * @property $id
 * @property $numeroFactura
 * @property $producto
 * @property $modelo
 * @property $partCode
 * @property $codigoAlternativo
 * @property $partName
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ListaDepo extends Model
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
