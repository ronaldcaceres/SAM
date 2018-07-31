@extends('plantilla.layout')
@section('contenido')

<div class="card mb-3">
        <div class="card-header">
        <a href="{{route('rol.create')}}"><button class="btn btn-info">Nuevo</button></a>
          <i class="fa fa-table"></i> Lista de Roles - Perfil: @foreach($perfil as $perfil){{$perfil->nombrePerfil}} @endforeach   </div>
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
                @if ($rol->estado == 1)
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

</div>
@endsection
@yield('contenidoroles')
@section('contenidoroles')
        <h1>AÑADIR ROL</h1>
        <form action="{{ route('rol.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
        
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreRol" required>
                                            <label class="form-label">Nombre Rol: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                        <label for="exampleInputEmail1">Descripcion: </label>
                                        <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion"></textarea>                                          
                                              
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreFormulario" required>
                                            <label class="form-label">Nombre Formulario: </label>    
                                            
                                        </div>                                        
                                        <br>
                                      </div>
                                </div>


            
                                <label for="exampleInputEmail1">Estado: </label>   
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>INACTIVO<input type="checkbox" name="estado" checked><span class="lever"></span>ACTIVO</label>
                                    </div>
                                
                                </div>
                                <br>
        <br>
            <input class="btn btn-primary btn-block" type="submit" name="INGRESAR" value="AÑADIR">
            <br>
            <a href="{{route('rol.index')}} " class="btn btn-danger">CANCELAR</a>
            
        </div>
        </form>






        <a href="{{route('perfil.index')}}"><button class="btn btn-info">Atras</button></a>
@endsection