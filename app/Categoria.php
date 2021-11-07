<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Tabla de la BD
    protected $table='categorias';
    
    //ID de la tabla alumnos
    protected $primaryKey='id';

    public $incrementing=false;

    public $timestamps=false;

    //atributos
    public $fillable=[
    	'id',
    	'categoria'
        
    ];


}