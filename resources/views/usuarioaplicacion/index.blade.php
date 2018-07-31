@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('usuarioaplicacion.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Usuarios Aplicacion</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Aplicacion</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Aplicacion</th>
                  <th>Usuario</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($usuarioaplicacion as $usuarioaplicacion)
                <tr>
                  <td>{{ $usuarioaplicacion->nombreAplicacion}}</td>
                  <td>{{ $usuarioaplicacion->nombreUsuario}}</td>





                @if ($usuarioaplicacion->estado == 1)
                  <td>ACTIVO</td>
                @else
                  <td>INACTIVO</td>
                @endif

                  
                  <td>
                    <a href="{{action('UsuarioAplicacionController@edit', $usuarioaplicacion -> idUsuarioAplicacion)}}"><button class="btn btn-info">Editar</button></a>
                     

                  </td>
                  <td>


                  <form action="{{action('UsuarioAplicacionController@destroy', $usuarioaplicacion->idUsuarioAplicacion)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                  <button class="btn btn-danger" type="submit">X</button>
                  </form>




                     </td>
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Usuarios y Aplicaciones creados</h3></td>
                            </tr>
                @endforelse
                
              </tbody>
            </table>


     




          </div>
        </div>
        <br>
@endsection