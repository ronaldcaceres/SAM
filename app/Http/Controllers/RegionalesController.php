<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regionales;
use App\Models\Auditoria;
use App\Models\Areas;

class RegionalesController extends Controller
{
    public function index()
    {
    	$regionales = Regionales::all();
        $title = 'Listado Tipo de regionales';
        return view('regionales.index',compact('title', 'regionales'));
    }

    public function show()
    {
        $regionales = Regionales::all();
        $title = 'Listado Tipo de regionales';
        return view('regionales.index',compact('title', 'regionales'));
    }


    public function store(Request $request)
    {
        $auditoria = new Auditoria;
        $regionales = new Regionales;
        $regionales -> nombreRegional = $request -> nombreRegional; 
        $regionales -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $regionales -> estado = 1;
        } else {
            $regionales -> estado = 0;
        }
        $regionales -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $regionales -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();

        $regionales-> save();
        return redirect()->route('regionales.index')->with('Success', 'regionales registrado existosamente');
    }

    public function create()
    {
        $title = 'Crear Nueva cargos';
        $regionales = Regionales::all();
        return view('regionales.create',compact('regionales'));
    }


    public function edit($id)
    {
    	$regionales = Regionales::all();
        $regionales = Regionales::find($id);
        $title = 'Modificar regionales';
        return view('regionales.edit', compact('title', 'regionales'));
    }





    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $regionales = Regionales::find($id);
        $regionales -> nombreRegional = $request -> nombreRegional; 
        $regionales -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $regionales -> estado = 1;
        } else {
            $regionales -> estado = 0;
        }
        $regionales -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'modificacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();


        $regionales -> save();
        return redirect()->route('regionales.index')->with('Success', 'regionales actualizado existosamente');
    }


    public function destroy($id)
    {
        $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        Regionales::find($id)->delete();
        return redirect()->route('regionales.index')->with('success','Registro eliminado satisfactoriamente');
    }

    
}
