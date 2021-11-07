<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Tabla de la BD
    protected $table='productos';
    
    //ID de la tabla alumnos
    protected $primaryKey='id';

    public $incrementing=true;

    public $timestamps=true;

    //atributos
    public $fillable=[
    	'id',
    	'nombre',
    	'descripcion',
    	'precio_venta',
    	'cantidad',
        'categoria'
    ];

}

   
