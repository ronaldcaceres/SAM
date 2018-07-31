<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolPerfil;
use App\Models\Aplicacion;
use App\Models\Rol;
use App\Models\Perfil;
use App\Models\Auditoria;
class RolPerfilController extends Controller
{
    public function index()
    {
        $rolperfil = RolPerfil::join("rol","rolperfil.idRol","=","rol.idRol") 
        ->join("perfil","rolperfil.idPerfil","=","perfil.idPerfil") 
        ->select('*','rolperfil.estado')     
        ->get();
        $aplicacion = Aplicacion::all();
        $title = 'Listado de rol y perfil';
        return view('rolperfil.index',compact('title', 'rolperfil'),compact('aplicacion'));
    }

    public function show()
    {
        $rolperfil = RolPerfil::join("rol","rolperfil.idRol","=","rol.idRol") 
        ->join("perfil","rolperfil.idPerfil","=","perfil.idPerfil") 
        ->select('*','rolperfil.estado')     
        ->get();
        $aplicacion = Aplicacion::all();
        $title = 'Listado de rol y perfil';
        return view('rolperfil.index',compact('title', 'rolperfil'),compact('aplicacion'));
    }




    public function store(Request $request)
    {
        $auditoria = new Auditoria;
        
        $rolperfil = new RolPerfil;
        $rolperfil -> idRol = $request -> idRol;
        $rolperfil -> idPerfil = $request -> idPerfil; 
        $rolperfil -> estado = $request -> estado;
        $rolperfil -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $rolperfil -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'rolperfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();

        $rolperfil-> save();
        return redirect()->route('rolperfil.index')->with('Success', 'Rol y Perfiles registrado existosamente');
    }

    public function create()
    {
    	
        $prod = Perfil::join('aplicacion','perfil.idAplicacion','=','aplicacion.idAplicacion')
        ->get();

        //$prod=Aplicacion::all();//get data from table
        return view('rolperfil.create',compact('prod'));//sent data to view

        /*$perfil = Perfil::all();

    	$rol = Rol::all();
        $title = 'Crear Nuevo Rol y Perfil';
        return view('rolperfil.create',compact('title', 'perfil'),compact('title', 'rol'));*/
    }


     public function edit($id)
    {
        $rol = Rol::all();
        $perfil = Perfil::all();
        $rolperfil = RolPerfil::find($id);
        $title = 'Modificar Rol Perfil';
        return view('rolperfil.edit', compact('title', 'rolperfil'),compact('rol', 'perfil'));
    }

    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $rolperfil = RolPerfil::find($id);
        $rolperfil -> idRol = $request -> idRol;
        $rolperfil -> idPerfil = $request -> idPerfil; 
        $rolperfil -> estado = $request -> estado;
        $rolperfil -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'modificacion'." ".'rolperfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        $rolperfil-> save();
        return redirect()->route('rolperfil.index')->with('Success', 'Rol Perfil actualizado existosamente');
    }

    public function destroy($id)
    {
         $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'rolperfil'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        RolPerfil::find($id)->delete();
        return redirect()->route('rolperfil.index')->with('success','Registro eliminado satisfactoriamente');
    }






    public function findProductName(Request $request){

        
        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Rol::select('nombreRol','idRol')->where('idAplicacion',$request->idAplicacion)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
    }

}
