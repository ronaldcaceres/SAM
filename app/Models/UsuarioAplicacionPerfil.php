<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioAplicacionPerfil extends Model
{
    protected $table = 'usuarioaplicacionperfil';

    protected $primaryKey = 'idUsuarioAplicacionPerfil';

    

    protected $fillable = [
    	'idUsuarioAplicacion',
    	'idPerfil',
    	'estado',
    	'fechaInicio',
    	'fechaFin',
    	'usuarioCreacion',
    	'fechaCreacion',
    	'usuarioModificacion',
    	'fechaModificacion'
    ];

    protected $guarded = [

    ];
}
