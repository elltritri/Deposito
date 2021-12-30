<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Listadofactura
 *
 * @property $id
 * @property $guia
 * @property $numeroFactura
 * @property $producto
 * @property $modelo
 * @property $partCode
 * @property $codigoAlternativo
 * @property $partName
 * @property $descripcion
 * @property $cantidad
 * @property $origen
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Listadofactura extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['guia','numeroFactura','producto','modelo','partCode','codigoAlternativo','partName','descripcion','cantidad','origen'];



}
