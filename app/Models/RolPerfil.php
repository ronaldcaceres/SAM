<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolPerfil extends Model
{
    protected $table = 'rolperfil';

    protected $primaryKey = 'idRolPerfil';

    

    protected $fillable = [
    	'idRol',
    	'idPerfil',
    	'estado',
    	'usuarioCreacion',
    	'fechaCreacion',
    	'usuarioModificacion',
    	'fechaModificacion'
    ];

    protected $guarded = [

    ];
}
