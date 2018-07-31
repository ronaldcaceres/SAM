<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Aplicacion;
use App\Models\Auditoria;
use App\Models\Rol;
use App\Models\RolPerfil;

class PerfilController extends Controller
{
    public function index()
    {        
        $perfil = Perfil::join("aplicacion","perfil.idAplicacion","=","aplicacion.idAplicacion")  
        ->select('*','perfil.estado','perfil.descripcion')     
        ->get();

        $aplicacion = Aplicacion::all();
        $title = 'Listado de perfil';
        return view('perfil.index',compact('title', 'perfil'),compact('aplicacion'));       
    }

    public function show()
    {

        $perfil = Perfil::join("aplicacion","perfil.idAplicacion","=","aplicacion.idAplicacion")
        ->select('aplicacion.nombreApliccion')
        ->get();

    
        $aplicacion = Aplicacion::all();
        $title = 'Listado de perfil';
        return view('perfil.index',compact('title', 'perfil'),compact('aplicacion'));
    }




    public function store(Request $request)
    {
        $auditoria = new Auditoria;
        $perfil = new Perfil;
        $perfil -> idAplicacion = $request -> idAplicacion;
        $perfil -> nombrePerfil = $request -> nombrePerfil; 
        $perfil -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $perfil -> estado = 1;
        } else {
            $perfil -> estado = 0;
        }
        $perfil -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $perfil -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');



        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'perfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        $perfil-> save();
        return redirect()->route('perfil.index')->with('Success', 'Perfil registrado existosamente');
    }

    public function create()
    {
        $rol = Rol::all();
    	$aplicacion = Aplicacion::all();
        $title = 'Crear Nuevo Perfil';
        return view('perfil.create',compact('rol', 'aplicacion'));
    }


    public function edit($id)
    {
        $aplicacion = Aplicacion::all();
        $perfil = Perfil::find($id);
        $title = 'Modificar perfil';
        return view('perfil.edit', compact('title', 'perfil'),compact('title', 'aplicacion'));
    }

    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $perfil = Perfil::find($id);
        $perfil -> idAplicacion = $request -> idAplicacion;
        $perfil -> nombrePerfil = $request -> nombrePerfil; 
        $perfil -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $perfil -> estado = 1;
        } else {
            $perfil -> estado = 0;
        }
        $perfil -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');


        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'modificacion'." ".'perfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        $perfil-> save();
        return redirect()->route('perfil.index')->with('Success', 'Perfil actualizado existosamente');
    }

    public function destroy($id)
    {
        $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'perfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        
        Perfil::find($id)->delete();
        return redirect()->route('perfil.index')->with('success','Registro eliminado satisfactoriamente');
    }














    public function cargarroles($idP)
    {
        /*$rolperfil = RolPerfil::join('rol','rolperfil.idRol','=','rol.idRol')
        ->join('perfil','rolperfil.idPerfil','=','perfil.idPerfil')
        ->join('aplicacion','perfil.idAplicacion','=','aplicacion.idAplicacion')
        ->get();
        //$aplicacion = Aplicacion::find($idA);
        $perfil = Perfil::join('aplicacion','perfil.idAplicacion','=','aplicacion.idAplicacion')
        ->where('perfil.idPerfil','=',$idP)
        ->get();
        return view('perfil.createrol', compact('rolperfil','perfil'), compact('aplicacion'));*/



        $perfil = Perfil::find($idP);
        $aplicacion = Aplicacion::join('perfil','aplicacion.idAplicacion','=','perfil.idAplicacion')
        ->where('perfil.idPerfil','=',$idP)
        ->get();
        $a=$perfil->idAplicacion;
        $rolperfil = RolPerfil::join('rol','rolperfil.idRol','=','rol.idRol')
        ->join('perfil','rolperfil.idPerfil','=','perfil.idPerfil')
        ->join('aplicacion','perfil.idAplicacion','=','aplicacion.idAplicacion')
        ->where('rol.idAplicacion','=',$a)
        ->select('*','rol.descripcion')
        ->get();


        return view('perfil.createrol', compact('rolperfil','perfil'), compact('aplicacion'));
        
        /*$rolperfil = RolPerfil::join('rol','rolperfil.idRol','=','rol.idRol')
        ->where('rolperfil.idPerfil','=',$idP)
        ->where('rol.idAplicacion','=',$idA)
        ->get();

        
        

        //$aplicacion = Aplicacion::all();
        return view('perfil.createrol', compact('rolperfil', 'aplicacion'), compact('perfil'));*/
    }

    public function storeroles(Request $request)
    {
        $auditoria = new Auditoria;
        $rolperfil = new RolPerfil;
        $rol = new Rol;
        $idAplicacion=$rol -> idAplicacion = $request -> idAplicacion;
        $rol -> nombreRol = $request -> nombreRol; 
        $rol -> descripcion = $request -> descripcion;
        $rol -> nombreFormulario = $request -> nombreFormulario;
        $rol -> estado = $request -> estado;
        $rol -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $rol -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $rol-> save();
        $a = $rol->idRol;
        $rolperfil -> idRol = $a;
        $idPerfil = $rolperfil -> idPerfil = $request -> idPerfil; 
        $rolperfil -> estado = $request -> estado;
        $rolperfil-> save();
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'rol'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();    
        
        //return redirect()->route('rol.index')->with('Success', 'Rol registrado existosamente');
        //return redirect()->route('perfil.rolperfil', ['idAplicacion']);

        //return redirect()->route('CargosAreas/$a')->with('Success', 'cargos registrado existosamente');
        
        return redirect()->action('PerfilController@cargarroles', [$idPerfil]);
        
        

    }


     public function eliminarrol($id)
    {
        /*$auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();



        $rolperfil = RolPerfil::find($id);
        $a=$rolperfil->idPerfil;

        RolPerfil::where('rolperfil.idRol','=',$id)
        ->delete();
        Rol::find($id)->delete();
        return redirect()->action('PerfilController@cargarroles', [$a]);*/
    }

    
}
