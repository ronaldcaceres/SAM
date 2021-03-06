<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Usuarios;
use App\Models\Logins;
use DB;

class LoginController extends Controller
{
    public function index(Request $request)
    { 
    	    

            $request->session()->forget('nombreUsuario');
            $request->session()->forget('apellidoPaterno');
            $request->session()->forget('apellidoMaterno');
            

    		$query = trim($request->get('nombreDominio'));
        	$query2 = hash('sha256',trim($request->get('password')));
            

            $login1 = DB::table('logins')    
            ->join('usuarios','logins.idLogin','=','usuarios.idLogin')        
            ->where('logins.nombreDominio','=',$query)
            ->where('logins.password','=',$query2)
            ->select('*','usuarios.nombreUsuario','usuarios.apellidoPaterno','usuarios.apellidoMaterno')
            ->first();

            



            if($login1 != null)
                {
                    
                    $estado = $login1->estado;
                    if($estado != 0){
                    $nombreUsuario = $login1->nombreUsuario;
                    $apellidoPaterno = $login1->apellidoPaterno;
                    $apellidoMaterno = $login1->apellidoMaterno;
                    $request->session()->put('nombreUsuario', $nombreUsuario);
                    session(['nombreUsuario' => $nombreUsuario]);
                    $request->session()->put('apellidoPaterno', $apellidoPaterno);
                    session(['apellidoPaterno' => $apellidoPaterno]);
                    $request->session()->put('apellidoMaterno', $apellidoMaterno);
                    session(['apellidoMaterno' => $apellidoMaterno]);
                    return view('plantilla.layout');
                    }
                    else{
                            return view('usuarios.login');
                    }

                    
                }
                else{
                    return view('usuarios.login');
                }



            /*

            //$profe = DB::select('SELECT idUsuario FROM usuarios WHERE nombreDominio = ?',[$query]);
            //$profe2 = DB::select('SELECT idUsuario FROM usuarios WHERE password = ?',[$query2]);
            $logins = Logins::all();

            $login1 = DB::table('logins')    
            ->join('usuarios','logins.idLogin','=','usuarios.idLogin')        
            ->where('nombreDominio','=',$query)
            ->select('*','usuarios.nombreUsuario','usuarios.apellidoPaterno','usuarios.apellidoMaterno')
            ->orderBy('idLogin', 'asc')
            ->first();
            $login2 = DB::table('logins')            
            ->where('password','=',$query2)
            ->orderBy('idLogin', 'asc')
            ->first();
           /* $title = $login1->nombreUsuario;
            $apellidoPaterno = $login1->apellidoPaterno;
            $apellidoMaterno = $login1->apellidoMaterno;*/
            
            /*

            if($login1 != null && $login2 != null)
                {
                    //return view('usuarios.index',compact('usuarios'));
                    //return view('plantilla.layout',compact('title'));
                     //usando el helper
                    $estado = $login1->estado;
                    if($estado != 0){
                    $nombreUsuario = $login1->nombreUsuario;
                    $apellidoPaterno = $login1->apellidoPaterno;
                    $apellidoMaterno = $login1->apellidoMaterno;
                    $request->session()->put('nombreUsuario', $nombreUsuario);
                    session(['nombreUsuario' => $nombreUsuario]);
                    $request->session()->put('apellidoPaterno', $apellidoPaterno);
                    session(['apellidoPaterno' => $apellidoPaterno]);
                    $request->session()->put('apellidoMaterno', $apellidoMaterno);
                    session(['apellidoMaterno' => $apellidoMaterno]);
                    return view('plantilla.layout');
                    }
                    else{
                            return view('usuarios.login');
                    }

                    
                }
                else{
                    return view('usuarios.login');
                }
            
            /*$login1 = DB::table('usuarios')            
            ->where('nombreDominio','=',$query)
            ->orderBy('idUsuario', 'asc')
            ->paginate();
            $login2 = DB::table('usuarios')
            ->where('usuarios.password','=',$query2)
            ->get();*/
           
            //dd($login1->nombreDominio);

            /*$usuarios = Usuarios::find($profe);
                if($profe != null && $profe2 != null)
                {
                    return view('usuarios.index',compact('usuarios'));
                    return view('plantilla.layout',compact('usuarios'));
                }
                else{
                    return view('usuarios.login');
                }  */       



    		/*$usuarios = DB::table('usuarios')->select('nombreUsuario')
			->where('usuarioDominio', '=', $query)
			->orderBy('idUsuario', 'asc')
			->paginate();*/		
           

    		/*if($profe != null && $profe2 != null){return view('usuarios.index');}
    		else{return view('usuarios.login');}*/
    }


    public function shore()
    {
    	return view('usuarios.login');
    }
}
