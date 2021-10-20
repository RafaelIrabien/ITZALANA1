<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papeleria extends Model
{
    //Tabla de la BD
    protected $table='papelerias';
    
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