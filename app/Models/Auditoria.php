<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditoria';

    protected $primaryKey = 'idAuditoria';

    

    protected $fillable = [
    	'idUsuario',
    	'idAplicacion',
    	'idRol',
    	'descripcion'
    ];

    protected $guarded = [

    ];
}
