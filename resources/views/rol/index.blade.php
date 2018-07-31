@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('rol.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Roles</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Aplicacion</th>
                  <th>Nombre Rol</th>
                  <th>Descripcion</th>
                  <th>Nombre Formulario</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Aplicacion</th>
                  <th>Nombre Rol</th>
                  <th>Descripcion</th>
                  <th>Nombre Formulario</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($rol as $rol)
                <tr>
                  <td>{{ $rol->nombreAplicacion}}</td>
                  <td>{{ $rol->nombreRol}}</td>
                  <td>{{ $rol->descripcion}}</td>
                  <td>{{ $rol->nombreFormulario}}</td>
                @if ($rol->estado == 0)
                  <td>ACTIVO</td>
                @else
                  <td>INACTIVO</td>
                @endif

                  
                  <td>
                    <a href="{{action('RolController@edit', $rol -> idRol)}}"><button class="btn btn-info">Editar</button></a>
                    </td>
                     <td>


                  <form action="{{action('RolController@destroy', $rol->idRol)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                  <button class="btn btn-danger" type="submit">X</button>
                  </form>


                     </td>
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Rol creados</h3></td>
                            </tr>
                @endforelse
                
              </tbody>
            </table>


     




          </div>
        </div>
        <br>
@endsection