<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
    //Tabla de la BD
    protected $table='farmacias';
    
    //ID de la tabla alumnos
    protected $primaryKey='sku';

    public $incrementing=false;

    public $timestamps=false;

    //atributos
    public $fillable=[
    	'sku',
    	'nombre',
        'descripcion',
    	'precio_venta',
    	'cantidad'
    ];


}