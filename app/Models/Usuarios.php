<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    protected $primaryKey = 'idUsuario';

    

    protected $fillable = [
    	'usuarioDominio',
    	'password',
    	'nombreUsuario',
    	'apellidoPaterno',
    	'apellidoMaterno',
    	'documentoIdentidad',
    	'estado',
        'numero_intentos',
    	'usuarioCreacion',
    	'fechaCreacion',
    	'usuarioModificacion',
    	'fechaModificacion'
    ];

    protected $guarded = [

    ];

}
