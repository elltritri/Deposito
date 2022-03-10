<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Deposito
 *
 * @property $id
 * @property $Descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Deposito extends Model
{
    
    static $rules = [
		'Descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion'];



}
