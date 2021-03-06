<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargos;
use App\Models\Auditoria;
use App\Models\Areas;

class CargosController extends Controller
{
    public function index()
    {
    	$cargos = Cargos::join("areas","cargos.idArea","=","areas.idArea")  
        ->select('*','cargos.estado','cargos.descripcion')     
        ->get();
        $title = 'Listado Tipo de cargos';
        return view('cargos.index',compact('title', 'cargos'));
    }

    public function show()
    {
        $cargos = Cargos::all();
        $title = 'Listado Tipo de cargos';
        return view('cargos.index',compact('title', 'cargos'));
    }


    public function store(Request $request)
    {
        $auditoria = new Auditoria;
        $cargos = new Cargos;
        $cargos -> idArea = $request -> idArea;
        $cargos -> nombreCargo = $request -> nombreCargo; 
        $cargos -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $cargos -> estado = 1;
        } else {
            $cargos -> estado = 0;
        }
        $cargos -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $cargos -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();

        $cargos-> save();
        return redirect()->route('cargos.index')->with('Success', 'cargos registrado existosamente');
    }

    public function create()
    {
        $title = 'Crear Nueva cargos';
        $areas = Areas::all();
        return view('cargos.create',compact('areas'));
    }


    public function edit($id)
    {
    	$areas = Areas::all();
        $cargos = Cargos::find($id);
        $title = 'Modificar cargos';
        return view('cargos.edit', compact('areas', 'cargos'));
    }





    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $cargos = Cargos::find($id);
        $a=$cargos -> idArea = $request -> idArea;
        $cargos -> nombreCargo = $request -> nombreCargo; 
        $cargos -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $cargos -> estado = 1;
        } else {
            $cargos -> estado = 0;
        }
        $cargos -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'modificacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();


        $cargos -> save();
        //return redirect()->route('cargos.index')->with('Success', 'cargos actualizado existosamente');
        return redirect()->action('AreasController@cargarcargos', [$a]);
    }


    public function destroy($id)
    {
        $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        Cargos::find($id)->delete();
        return redirect()->route('cargos.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
