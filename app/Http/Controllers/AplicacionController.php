<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplicacion;
use App\Models\Auditoria;

class AplicacionController extends Controller
{
    public function index()
    {
        $aplicacion = Aplicacion::all();
        $title = 'Listado Tipo de aplicaciones';
        return view('aplicacion.index',compact('title', 'aplicacion'));
    }

    public function show()
    {
        $aplicacion = Aplicacion::all();
        $title = 'Listado Tipo de aplicaciones';
        return view('aplicacion.index',compact('title', 'aplicacion'));
    }


    public function store(Request $request)
    {
        $auditoria = new Auditoria;
        $aplicacion = new Aplicacion;
        $aplicacion -> codAplicacion = $request -> codAplicacion;
        $aplicacion -> nombreAplicacion = $request -> nombreAplicacion; 
        $aplicacion -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $aplicacion -> estado = 1;
        } else {
            $aplicacion -> estado = 0;
        }
        $aplicacion -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $aplicacion -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();

        $aplicacion-> save();
        return redirect()->route('aplicacion.index')->with('Success', 'Aplicacion registrado existosamente');
    }

    public function create()
    {
        $title = 'Crear Nueva Aplicacion';
        return view('aplicacion.create',compact('title'));
    }


    public function edit($id)
    {
        $aplicacion = Aplicacion::find($id);
        $title = 'Modificar aplicacion';
        return view('aplicacion.edit', compact('title', 'aplicacion'));
    }





    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $aplicacion = Aplicacion::find($id);
        $aplicacion -> codAplicacion = $request -> codAplicacion;
        $aplicacion -> nombreAplicacion = $request -> nombreAplicacion; 
        $aplicacion -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $aplicacion -> estado = 1;
        } else {
            $aplicacion -> estado = 0;
        }
        $aplicacion -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'modificacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();


        $aplicacion -> save();
        return redirect()->route('aplicacion.index')->with('Success', 'Aplicacion actualizado existosamente');
    }


    public function destroy($id)
    {
        $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        Aplicacion::find($id)->delete();
        return redirect()->route('aplicacion.index')->with('success','Registro eliminado satisfactoriamente');
    }

}
