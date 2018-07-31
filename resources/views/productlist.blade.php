<!DOCTYPE html>
<html>
<head>
  


</head>
<body>

<center>
	<h1>prueba selec con ajax e_V_V</h1>

	
	<select style="width: 200px" class="productcategory" id="prod_cat_id">
		
		<option value="0" disabled="true" selected="true">seleccione Area</option>
		@foreach($prod as $cat)
			<option value="{{$cat->idArea}}">{{$cat->nombreArea}}</option>
		@endforeach

	</select>

	
	<select style="width: 200px" class="productname">

		<option value="0" disabled="true" selected="true">seleccione Cargo</option>
	</select>









 

</center>

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
					op+='<option value="0" selected disabled>chose product</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].idCargo+'">'+data[i].idCargo+data[i].nombreCargo+'</option>';
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

</body>
</html>