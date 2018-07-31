@extends('plantilla.layout')

@section('contenido')




<h1>MODIFICAR USUARIO</h1>
<form action="{{route('usuarios.update', $usuarios -> idUsuario)}}" method="POST">
{{ csrf_field() }}
<div class="form-group">

	<input name="_method" type="hidden" value="PATCH">



                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreDominio" value="{{$usuarios -> nombreDominio}}" required>
                                            <label class="form-label">Nombre Dominio: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="password" name="password" value="{{$usuarios -> password}}" required>
                                            <label class="form-label">Password: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreUsuario" value="{{$usuarios -> nombreUsuario}}" required>
                                            <label class="form-label">Nombre Usuario:  </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="apellidoPaterno" value="{{$usuarios -> apellidoPaterno}}" required>
                                            <label class="form-label">Apellido Paterno:  </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="apellidoMaterno" value="{{$usuarios -> apellidoMaterno}}" required>
                                            <label class="form-label">Apellido Materno:  </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="documentoIdentidad" value="{{$usuarios -> documentoIdentidad}}" required>
                                            <label class="form-label">Documento Identidad:  </label>    
                                            
                                        </div>


                                    </div>
                                </div>


                                        @if($usuarios -> estado == 1)
                                        <div class="demo-switch">
                                            <div class="switch">
                                            
                                                <label>INACTIVO<input type="checkbox" name="estado" checked><span class="lever"></span>ACTIVO</label>
                                            </div>
                                        
                                        </div>
                                        @else
                                        <div class="demo-switch">
                                            <div class="switch">
                                                <label>INACTIVO<input type="checkbox" name="estado"><span class="lever"></span>ACTIVO</label>
                                                
                                            
                                            </div>
                                        
                                        </div>
                                        @endif
<br>

    <button class="btn btn-primary btn-block" type="submit">MODIFICAR</button>
    <a href="{{route('usuarios.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>




@endsection