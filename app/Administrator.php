<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
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
    	'usuarioCreacion',
    	'fechaCreacion',
    	'usuarioModificacion',
    	'fechaModificacion'
    ];

    protected $guarded = [

    ];


}
