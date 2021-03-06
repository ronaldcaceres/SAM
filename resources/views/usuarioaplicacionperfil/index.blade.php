@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('usuarioaplicacionperfil.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Usuarios Aplicaciones Perfiles</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Usuario Aplicacion</th>
                  <th>Perfil</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Roles</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Usuario Aplicacion</th>
                  <th>Perfil</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th>Roles</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($usuarioaplicacionperfil as $usuarioaplicacionperfil)
                <tr>
                  <td>{{ $usuarioaplicacionperfil->nombreAplicacion}}</td>
                  <td>{{ $usuarioaplicacionperfil->nombrePerfil}}</td>                 
                  <td>{{ $usuarioaplicacionperfil->nombreUsuario}} {{ $usuarioaplicacionperfil->apellidoPaterno}}</td>
                  <td>{{ $usuarioaplicacionperfil->nombreRol}}</td> 
                @if ($usuarioaplicacionperfil->estado == 0)
                  <td>ACTIVO</td>
                @else
                  <td>INACTIVO</td>
                @endif

                {{$a=$usuarioaplicacionperfil->idRolPerfil}}
                  <td>
                  <a href="{{url('prueba', $usuarioaplicacionperfil -> idPerfil)}}"><button class="btn btn-info">Roles</button></a>

                  </td>
                  
                  <td>
                    <a href="{{action('UsuarioAplicacionPerfilController@edit', $usuarioaplicacionperfil -> idUsuarioAplicacionPerfil)}}"><button class="btn btn-info">Editar</button></a>
                     

                   <td>


                  <form action="{{action('UsuarioAplicacionPerfilController@destroy', $usuarioaplicacionperfil->idUsuarioAplicacionPerfil)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">

                  <button class="btn btn-danger" type="submit">X</button>
                  </form>


                     </td>
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay Usuario Aplicacion Perfil creados</h3></td>
                            </tr>
                @endforelse




              </tbody>
            </table>
                  


     




          </div>
        </div>
        <br>





        
@endsection