<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empledo';
    protected $primaryKey='idempleado';

    public $timestamps=false;

    protected $fillable=[
    	'persona_idpersona',
    	'fechainicio',
    	'puesto',
    	'salario',
    	'tarjetasalud',
    ];
}
