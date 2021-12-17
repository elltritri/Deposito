<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bom
 *
 * @property $id
 * @property $partCode
 * @property $codigoAlternativo
 * @property $partName
 * @property $descripcion
 * @property $cantidad
 * @property $origen
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bom extends Model
{
    
    
  static $rules = [
		'guia'=>'nulleable',
    	'numeroFactura'=>'nulleable',
		'producto'=>'nulleable',
		'modelo'=>'nulleable',
		'partCode' => 'nulleable',
		'codigoAlternativo' => 'nulleable',
		'partName' => 'nulleable',
		'descripcion' => 'nulleable',
		'cantidad' => 'nulleable',
		'origen' => 'nulleable',
    ];

    protected $perPage = 20;

  
    protected $fillable = ['guia','numeroFactura','producto','modelo','partCode','codigoAlternativo','partName','descripcion','cantidad','origen'];



}
