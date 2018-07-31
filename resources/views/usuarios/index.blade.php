@extends('plantilla.layout')
@section('contenido')




<div class="card mb-3">

        <div class="card-header">

        <a href="{{route('usuarios.create')}}"><button class="btn btn-info">Nuevo</button></a>

          <i class="fa fa-table"></i> Lista de Usuarios</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nombre Dominio</th>
                  <th>Nombre Usuario</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Documento</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nombre Dominio</th>
                  <th>Nombre Usuario</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Documento</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
              {{ csrf_field() }}
                @forelse ($usuarios as $usuarios)
                <tr>
                  <td>{{ $usuarios->nombreDominio}}</td>
                  <td>{{ $usuarios->nombreUsuario}}</td>
                  <td>{{ $usuarios->apellidoPaterno}}</td>
                  <td>{{ $usuarios->apellidoMaterno}}</td>
                  <td>{{ $usuarios->documentoIdentidad}}</td>
                  
      					@if	($usuarios->estado == 1)
      						<td>ACTIVO</td>
      					@else
      						<td>INACTIVO</td>
      					@endif

                  
                  <td>
                  	<a href="{{action('UsuariosController@edit', $usuarios -> idUsuario)}}"><button class="btn btn-info">Editar</button></a>                    
                  </td>
                  <td>
                    <form action="{{action('UsuariosController@destroy', $usuarios->idUsuario)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">

                    <button class="btn btn-danger" type="submit">X</button>
                    </form>
                  </td>   
                     
                </tr>
                @empty
                            <tr>
                                <td colspan="9"><h3>No hay usuarios creados</h3></td>
                            </tr>

                @endforelse
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
        <br>








@endsection