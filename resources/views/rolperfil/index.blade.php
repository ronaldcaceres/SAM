@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('rolperfil.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Perfiles Y Roles</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Rol</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Rol</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($rolperfil as $rolperfil)
                <tr>
                  <td>{{ $rolperfil->nombreRol}}</td>
                  <td>{{ $rolperfil->nombrePerfil}}</td>
                @if ($rolperfil->estado == 0)
                  <td>ACTIVO</td>
                @else
                  <td>INACTIVO</td>
                @endif

                  
                  <td>
                    <a href="{{action('RolPerfilController@edit', $rolperfil -> idRolPerfil)}}"><button class="btn btn-info">Editar</button></a>
                     </td>

                  <td>
                  <form action="{{action('RolPerfilController@destroy', $rolperfil->idRolPerfil)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-danger" type="submit">X</button>
                    </form>
                    </td>

                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Roles y Perfiles creados</h3></td>
                            </tr>
                @endforelse
                
              </tbody>
            </table>


     




          </div>
        </div>
        <br>
@endsection