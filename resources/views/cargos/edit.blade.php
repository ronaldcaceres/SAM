@extends('plantilla/layout')
@section('contenido')


<h1>MODIFICAR CARGOS</h1>
<form action="{{route('cargos.update', $cargos -> idCargo)}}" method="POST">

{{ csrf_field() }}
<div class="form-group">

<input name="_method" type="hidden" value="PATCH">
<label for="exampleInputEmail1">Area: </label>
    


    <select class="form-control" name="idArea">
        @forelse ($areas as $areas)
        

            @if(($cargos->idArea) == ($areas->idArea))
            <option value="{{ $areas->idArea}}" selected>{{ $areas->nombreArea}}</option>             
            @endif  
            
                  
        


        @empty
        <option value="">No hay areas creados</option>}
        @endforelse
    </select>
    <br><br><br>

    <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreCargo" value="{{$cargos -> nombreCargo}}" required>
                                            <label class="form-label">Nombre cargo </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                        <label for="exampleInputEmail1">Descripcion: </label>
                                        <textarea class="form-control" placeholder="Escribe aqui una descripcion" name="descripcion">{{$cargos -> descripcion}}</textarea>
                                            
                                              
                                            
                                        </div>
                                        <br>
                                        
                                        <br>                          


                                    </div>
                                </div>
                

    
                                @if($cargos -> estado == 1)
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
                    <a href="{{route('cargos.index')}} " class="btn btn-default waves-effect">CANCELAR</a>
    
</div>
</form>






@endsection