<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logins extends Model
{
    protected $table = 'logins';

    protected $primaryKey = 'idLogin';

    

    protected $fillable = [
    	'nombreDominio',
    	'password',
    	'api_token',
    	'numero_intentos',
    	'estado',
    	'usuarioCreacion',
    	'fechaCreacion',
    	'usuarioModificacion',
    	'fechaModificacion'
    ];

    protected $guarded = [

    ];
}
