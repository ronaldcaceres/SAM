@extends('plantilla/layout')
@section('contenido')


<h1>AÑADIR USUARIO</h1>

<form action="{{ route('usuarios.store')}}" method="POST">
{{ csrf_field() }}
<div class="form-group">


                                

                                <div class="col-sm-12">
                                
                                <br>
                                

                                    <div class="form-group form-float">
                                       
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreDominio" required>
                                            <label class="form-label">Nombre Dominio: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="password" name="password" required>
                                            <label class="form-label">Password: </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="nombreUsuario" required>
                                            <label class="form-label">Nombre Usuario:  </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="apellidoPaterno" required>
                                            <label class="form-label">Apellido Paterno:  </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="apellidoMaterno" required>
                                            <label class="form-label">Apellido Materno:  </label>    
                                            
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            
                                            <input class="form-control" type="text" name="documentoIdentidad" required>
                                            <label class="form-label">Documento Identidad:  </label>    
                                            
                                        </div>


                                    </div>
                                </div>
                                <select style="width: 300px" class="productcategory" id="prod_cat_id">
        
                                <option value="0" disabled="true" selected="true">Seleccione Area</option>
                                @foreach($prod as $cat)
                                    <option value="{{$cat->idArea}}">{{$cat->nombreArea}}</option>
                                @endforeach

                                </select>
                                <br>
                                
                                <select style="width: 300px" class="productname" name="idCargo">

                                    <option value="0" disabled="true" selected="true">Seleccione Cargo</option>
                                </select>

                                <br><br>

                                <label for="exampleInputEmail1">Regional: </label>
                                <select class="form-control" name="idRegional" required>
                                <option value="">Elige una opción</option>
                                    @forelse ($regionales as $regionales)
                                       
                                              <option value="{{ $regionales->idRegional}}">{{ $regionales->nombreRegional}}</option>           
                                               
                                    @empty
                                    <option value="">No hay regiones creadas</option>
                                    @endforelse
                                </select>
                                <br>





                                <label for="exampleInputEmail1">Estado: </label>   
                                <div class="demo-switch">
                                    <div class="switch">
                                        <label>INACTIVO<input type="checkbox" name="estado" checked><span class="lever"></span>ACTIVO</label>
                                    </div>
                                
                                </div>

    
    
     


    




 
<br>
    <input class="btn btn-primary btn-block" type="submit" name="INGRESAR" value="AÑADIR">
    <br>
    <a href="{{route('usuarios.index')}} " class="btn btn-danger">CANCELAR</a>
    
</div>
</form>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.productcategory',function(){
            // console.log("hmm its change");

            var cat_idArea=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findProductName')!!}',
                data:{'idArea':cat_idArea},
                success:function(data){
                    //console.log('success');

                    //console.log(data);

                    //console.log(data.length);
                    op+='<option value="0" selected disabled>Seleccione Cargo</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].idCargo+'">'+data[i].nombreCargo+'</option>';
                   }

                   div.find('.productname').html(" ");
                   div.find('.productname').append(op);
                },
                error:function(){

                }
            });
        });

        

    });
</script>






@endsection