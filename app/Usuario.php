<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
        
    public $timestamps = false;
    
    public function isAdmin()
    {
    	return $this->password === 'jorge';
    } 
    public static function findByPass($pass)
    {
    	return Usuario::where(compact('password'));
    }

}
