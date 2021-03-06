<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regionales extends Model
{
    protected $table = 'regionales';

    protected $primaryKey = 'idRegional';

    

    protected $fillable = [
    	'nombreRegional',
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
