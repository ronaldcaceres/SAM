<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioAplicacion;
use App\Models\UsuarioAplicacionPerfil;
use App\Models\Perfil;
use App\Models\RolPerfil;
use App\Models\Auditoria;
use App\Models\Aplicacion;

class UsuarioAplicacionPerfilController extends Controller
{
    public function index()
    {
        
        $usuarioaplicacionperfil = UsuarioAplicacionPerfil::join("usuarioaplicacion","usuarioaplicacionperfil.idUsuarioAplicacion","=","usuarioaplicacion.idUsuarioAplicacion")

        ->join("perfil","usuarioaplicacionperfil.idPerfil","=","perfil.idPerfil") 
        ->join("rolperfil","perfil.idPerfil","=","rolperfil.idPerfil")
        ->join("rol","rolperfil.idRol","=","rol.idRol")
        ->join("usuarios","usuarioaplicacion.idUsuario","=","usuarios.idUsuario") 
        ->join("aplicacion","usuarioaplicacion.idAplicacion","=","aplicacion.idAplicacion") 
        ->groupBy('usuarioaplicacionperfil.idUsuarioAplicacionPerfil')
        ->select('*','usuarioaplicacionperfil.estado')  
        ->get();




        /*$rolperfil = RolPerfil::join("rol","rolperfil.idRol","=","rol.idRol") 
        ->join("aplicacion","rol.idAplicacion","=","aplicacion.idAplicacion")
        ->join("perfil","rolperfil.idPerfil","=","perfil.idPerfil") 
        ->join("usuarioaplicacionperfil","perfil.idPerfil","=","usuarioaplicacionperfil.idPerfil")
        ->groupBy('rol.idRol')
        ->get();*/

       
         
     


       /* $usuarioaplicacionperfil = UsuarioAplicacionPerfil::join("perfil","usuarioaplicacionperfil.idPerfil","=","perfil.idPerfil")
        ->join("rolperfil","perfil.idPerfil","=","rolperfil.idPerfil")
        ->join("rol","rolperfil.idRol","=","rol.idRol")
        ->join("usuarioaplicacion","usuarioaplicacionperfil.idUsuarioAplicacion","=","usuarioaplicacion.idUsuarioAplicacion")
        ->join("usuarios","usuarioaplicacion.idUsuario","=","usuarios.idUsuario")
        ->join("aplicacion","usuarioaplicacion.idAplicacion","=","aplicacion.idAplicacion") 
        ->select('*','usuarioaplicacionperfil.estado')  
        ->get();*/
        
        return view('usuarioaplicacionperfil.index',compact('usuarioaplicacionperfil'),compact('rolperfil'));        
    }

    public function show()
    {
        $usuarioaplicacionperfil = UsuarioAplicacionPerfil::all();
        $aplicacion = Aplicacion::all();
        $title = 'Listado de Usuarios Aplicacion Perfil';
        return view('usuarioaplicacionperfil.index',compact('title', 'usuarioaplicacionperfil'),compact('aplicacion'));
    }


    public function store(Request $request)
    {
        $auditoria = new Auditoria;
        $usuarioaplicacionperfil = new UsuarioAplicacionPerfil;
        $usuarioaplicacionperfil -> idUsuarioAplicacion = $request -> idUsuarioAplicacion;
        $usuarioaplicacionperfil -> idPerfil = $request -> idPerfil; 
        $usuarioaplicacionperfil -> estado = $request -> estado;
        $usuarioaplicacionperfil -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $usuarioaplicacionperfil -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'usuarioaplicacionperfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        $usuarioaplicacionperfil-> save();


        return redirect()->route('usuarioaplicacionperfil.index')->with('Success', 'Usuarios Aplicacion Perfil  registrado existosamente');
    }

    public function create()
    {
        $usuarioaplicacion = UsuarioAplicacion::join("usuarios","usuarioaplicacion.idUsuario","=","usuarios.idUsuario") 
        ->join("aplicacion","usuarioaplicacion.idAplicacion","=","aplicacion.idAplicacion") 
        ->select('*')     
        ->get();
    	$perfil = Perfil::all();
    	$usuarioaplicacionperfil = UsuarioAplicacionPerfil::all();
        $title = 'Crear Nuevo usuario aplicacion perfil';
        return view('usuarioaplicacionperfil.create',compact('title', 'perfil'),compact('title', 'usuarioaplicacion'));
    }

 


    public function edit($id)
    {
        $perfil = Perfil::all();
        $aplicacion = Aplicacion::all();
    	$usuarioaplicacion = UsuarioAplicacion::all();
        $usuarioaplicacionperfil = UsuarioAplicacionPerfil::find($id);  

        $usuarioaplicacion2 = UsuarioAplicacion::join("aplicacion","usuarioaplicacion.idAplicacion","=","aplicacion.idAplicacion")
        ->join("usuarios","usuarioaplicacion.idUsuario","=","usuarios.idUsuario")
        ->get();


        $title = 'Modificar Usuario Aplicacion perfil';
        return view('usuarioaplicacionperfil.edit', compact('usuarioaplicacion', 'usuarioaplicacionperfil'),compact('perfil', 'usuarioaplicacion2'));
    }

    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $usuarioaplicacionperfil = UsuarioAplicacionPerfil::find($id);
        $usuarioaplicacionperfil -> idUsuarioAplicacion = $request -> idUsuarioAplicacion;
        $usuarioaplicacionperfil -> idPerfil = $request -> idPerfil; 
        $usuarioaplicacionperfil -> estado = $request -> estado;        
        $usuarioaplicacionperfil -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'modificacion'." ".'usuarioaplicacionperfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();


        $usuarioaplicacionperfil-> save();

        return redirect()->route('usuarioaplicacionperfil.index')->with('Success', 'Usuario aplicacion perfil actualizado existosamente');
    }

public function destroy($id)
    {
        $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'usuarioaplicacionperfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        UsuarioAplicacionPerfil::find($id)->delete();
        return redirect()->route('usuarioaplicacionperfil.index')->with('success','Registro eliminado satisfactoriamente');
        
    }


    public function roles(Request $request, $id)
    {   
        
        $rolperfil = RolPerfil::join("rol","rolperfil.idRol","=","rol.idRol")
        ->where('rolperfil.idPerfil','=',$id)        
        ->get();
        dd($rolperfil);

        //return view('usuarioaplicacionperfil.roles',compact('rolperfil'));  

        
        
    }
    
    

}
