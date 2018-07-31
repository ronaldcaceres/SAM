@extends('plantilla/layout')
@section('contenido')


<h1>MODIFICAR APLICACION</h1>
<form action="{{route('aplicacion.update', $aplicacion -> idAplicacion)}}" method="POST">

{{ csrf_field() }}
<div class="form-group">
<input name="_method" type="hidden" value="PATCH">

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="codAplicacion" value="{{$aplicacion -> codAplicacion}}" required>
                                            <label class="form-label">Codigo Aplicacion: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreAplicacion" value="{{$aplicacion -> nombreAplicacion}}" required>
                                            <label class="form-label">Nombre Aplicacion: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                        <label for="exampleInputEmail1">Descripcion: </label>
                                        <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion" >{{$aplicacion -> descripcion}}</textarea>
                                            
                                              
                                            
                                        </div>
                                        <br>                          


                                    </div>
                                </div>


                                        @if($aplicacion -> estado == 1)
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
    <br>

    <button class="btn btn-primary btn-block" type="submit">MODIFICAR</button>
    <a href="{{route('aplicacion.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>






@endsection