<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //Tabla de la BD
    protected $table='users';
    
    //ID de la tabla alumnos
    protected $primaryKey='id';

    public $incrementing=false;

    public $timestamps=true;

    //atributos
    public $fillable=[
    	'id',
    	'name',
    	'email',
    	'email_verified',
    	'password',
        'remember_token'

    ];


}

   
