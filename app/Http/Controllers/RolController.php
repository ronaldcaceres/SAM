<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Aplicacion;
use App\Models\Auditoria;
use App\Models\RolPerfil;

class RolController extends Controller
{
    public function index()
    {
        $rol = Rol::join("aplicacion","rol.idAplicacion","=","aplicacion.idAplicacion")  
        ->select('*','rol.estado','rol.descripcion')     
        ->get();
        $aplicacion = Aplicacion::all();
        $title = 'Listado de rol';
        return view('rol.index',compact('title', 'rol'),compact('aplicacion'));
    }

    public function show()
    {
        $rol = Rol::join("aplicacion","rol.idAplicacion","=","aplicacion.idAplicacion")  
        ->select('*','rol.estado')     
        ->get();
        $aplicacion = Aplicacion::all();
        $title = 'Listado de rol';
        return view('rol.index',compact('title', 'rol'),compact('aplicacion'));
    }




    public function store(Request $request)
    {

        $auditoria = new Auditoria;
        $rol = new Rol;
        $rol -> idAplicacion = $request -> idAplicacion;
        $rol -> nombreRol = $request -> nombreRol; 
        $rol -> descripcion = $request -> descripcion;
        $rol -> nombreFormulario = $request -> nombreFormulario;
        $rol -> estado = $request -> estado;
        $rol -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $rol -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'rol'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();    
        $rol-> save();
        return redirect()->route('rol.index')->with('Success', 'Rol registrado existosamente');
        //return redirect()->route('perfil.rolperfil', ['idAplicacion']);
        

    }

    public function create()
    {
    	$aplicacion = Aplicacion::all();
        $title = 'Crear Nuevo rol';
        return view('rol.create',compact('title', 'aplicacion'));
    }



    public function edit($id)
    {
        $aplicacion = Aplicacion::all();
        $rol = Rol::find($id);
        $title = 'Modificar Rol';
        return view('rol.edit', compact('title', 'rol'),compact('title', 'aplicacion'));
    }

    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $rolperfil = RolPerfil::where('rolperfil.idRol','=',$id)
        ->select('rolperfil.idPerfil')
        ->get();
        $rol = Rol::find($id);
        $rol -> idAplicacion = $request -> idAplicacion;
        $rol -> nombreRol = $request -> nombreRol; 
        $rol -> descripcion = $request -> descripcion;
        $rol -> nombreFormulario = $request -> nombreFormulario;
        $rol -> estado = $request -> estado;
        $rol -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');


        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'modificacion'." ".'rol'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();



        $rol-> save();
        //return redirect()->route('rol.index')->with('Success', 'rol actualizado existosamente');
        return redirect()->action('PerfilController@cargarroles', [$rolperfil]);
    }

    public function destroy($id)
    {
         $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'rol'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        
        Rol::find($id)->delete();
        return redirect()->route('rol.index')->with('success','Registro eliminado satisfactoriamente');
    }

}
