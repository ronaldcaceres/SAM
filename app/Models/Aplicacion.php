<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    protected $table = 'aplicacion';

    protected $primaryKey = 'idAplicacion';

    

    protected $fillable = [
    	'codAplicacion',
    	'nombreAplicacion',
    	'descripcion',
    	'estado',
    	'usuarioCreacion',
    	'fechaCreacion',
    	'usuarioModificacion',
    	'fechaModificacion'
    ];

    protected $guarded = [

    ];
}
