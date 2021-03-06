<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Auditoria;
use App\Models\Cargos;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Areas::all();
        $title = 'Listado Tipo de areas';
        return view('areas.index',compact('title', 'areas'));
    }

    public function show()
    {
        $areas = Areas::all();
        $title = 'Listado Tipo de areas';
        return view('areas.index',compact('title', 'areas'));
    }


    public function store(Request $request)
    {
        $auditoria = new Auditoria;
        $areas = new Areas;
        $areas -> nombreArea = $request -> nombreArea; 
        $areas -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $areas -> estado = 1;
        } else {
            $areas -> estado = 0;
        }
        $areas -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $areas -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();

        $areas-> save();
        return redirect()->route('areas.index')->with('Success', 'areas registrado existosamente');
    }

    public function create()
    {
        $title = 'Crear Nueva areas';
        return view('areas.create',compact('title'));
    }


    public function edit($id)
    {
        $areas = Areas::find($id);
        $title = 'Modificar areas';
        return view('areas.edit', compact('title', 'areas'));
    }





    public function update(Request $request, $id)
    {
        $auditoria = new Auditoria;
        $areas = new Areas;
        $areas = Areas::find($id);
        $areas -> nombreArea = $request -> nombreArea; 
        $areas -> descripcion = $request -> descripcion;
        if ($request -> estado == 'on') {
            $areas -> estado = 1;
        } else {
            $areas -> estado = 0;
        }
        $areas -> usuarioCreacion = session('nombreUsuario')." ".session('apellidoPaterno');
        $areas -> usuarioModificacion = session('nombreUsuario')." ".session('apellidoPaterno');

        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'creacion'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();

        $areas-> save();
        return redirect()->route('areas.index')->with('Success', 'areas actualizado existosamente');
    }


    public function destroy($id)
    {
        $areas = new Areas;
        $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        Areas::find($id)->delete();
        return redirect()->route('areas.index')->with('success','Registro eliminado satisfactoriamente');
    }











    public function cargarcargos ($idA)
    {
        $cargos = Cargos::where('cargos.idArea','=',$idA)
        ->get();
        $areas = Areas::find($idA);
        return view('areas.createcargos', compact('cargos', 'areas'));
    }


    public function storecargos(Request $request)
    {

        $auditoria = new Auditoria;
        $cargos = new Cargos;
        $a=$cargos -> idArea = $request -> idArea;
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
        //return redirect()->route('CargosAreas/$a')->with('Success', 'cargos registrado existosamente');
        return redirect()->action('AreasController@cargarcargos', [$a]);
        

    }

    public function eliminarcargo($id)
    {
        $auditoria = new Auditoria;
        $auditoria -> descripcion = session('nombreUsuario')." ".session('apellidoPaterno')." ".'elimino'." ".'aplicacion'." ".date('Y-m-d, H:i:s');
        $auditoria-> save();
        $cargos = Cargos::find($id);
        $a=$cargos->idArea;
        Cargos::find($id)->delete();
        return redirect()->action('AreasController@cargarcargos', [$a]);
    }
}
