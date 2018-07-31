<?php

use App\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$login = DB::table('usuarios')->select('idUsuario')->where('password','=','Einar');
        //
        Usuario::create([
        	'usuarioDominio' => 'jorge',
        	'password' => 'jorge',
        	'nombreUsuario' => 'jorge',
        	'apellidoPaterno' => 'jorge', 
        	'apellidoMaterno' => 'jorge', 
        	'documentoIdentidad' => '1234',
        	'estado' => '1',
        	'usuarioCreacion' => 'jorge',
        	'fechaCreacion' => '2018-07-20',
        	'usuarioModificacion' => 'jorge',
        	'fechaModificacion' => '2018-07-20',

        ]);


        /*DB::table('usuarios')->insert([
        	'usuarioDominio' => 'jorge',
        	'password' => 'jorge',
        	'nombreUsuario' => 'jorge',
        	'apellidoPaterno' => 'jorge', 
        	'apellidoMaterno' => 'jorge', 
        	'documentoIdentidad' => '123',
        	'estado' => '1',
        	'usuarioCreacion' => 'jorge',
        	'fechaCreacion' => '2018-06-20',
        	'usuarioModificacion' => 'jorge',
        	'fechaModificacion' => '2018-06-20',
        ]);*/
    }
}
