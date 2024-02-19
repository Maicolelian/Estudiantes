<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Listum
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $genero
 * @property $fecha
 * @property $telefono
 * @property $correo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Listum extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'genero' => 'required',
		'fecha' => 'required',
		'telefono' => 'required',
		'correo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido','genero','fecha','telefono','correo'];



}
