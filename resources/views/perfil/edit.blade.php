@extends('plantilla/layout')
@section('contenido')


<h1>MODIFICAR PERFIL</h1>
<form action="{{route('perfil.update', $perfil -> idPerfil)}}" method="POST">

{{ csrf_field() }}
<div class="form-group">

<input name="_method" type="hidden" value="PATCH">
<label for="exampleInputEmail1">Codigo Aplicacion: </label>
    


    <select class="form-control" name="idAplicacion">
        @forelse ($aplicacion as $aplicacion)
        

            @if(($perfil->idAplicacion) == ($aplicacion->idAplicacion))
            <option value="{{ $aplicacion->idAplicacion}}" selected>{{ $aplicacion->nombreAplicacion}}</option>             
            @endif  
            <option value="{{ $aplicacion->idAplicacion}}">{{ $aplicacion->nombreAplicacion}}</option> 
                  
        


        @empty
        <option value="">No hay Aplicaciones creados</option>}
        @endforelse
    </select>
    <br><br><br>

    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombrePerfil" value="{{$perfil -> nombrePerfil}}" required>
                                            <label class="form-label">Nombre Perfil </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                        <label for="exampleInputEmail1">Descripcion: </label>
                                        <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion">{{$perfil -> descripcion}}</textarea>
                                            
                                              
                                            
                                        </div>
                                        <br>
                                        
                                        <br>                          


                                    </div>
                                </div>
                

    
                                @if($perfil -> estado == 1)
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

    <button class="btn btn-primary btn-block" type="submit">MODIFICAR</button>
    <a href="{{route('perfil.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>






@endsection