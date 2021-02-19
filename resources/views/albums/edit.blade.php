<div class="container">
	@if(!$errors->any())
	<div id="winEditar" class="w3-modal">
	@else
	<div id="winEditar" class="w3-modal">
	<script>
      document.getElementById('winEditar').style.display='block';
	</script>
	@endif
		<div class="w3-modal-content w3-container w3-padding w3-margin-top" style="max-width:500px">
			<header style="background-color:#B3DFDA"> 
				<span onclick="document.getElementById('winEditar').style.display='none'" class="m-2 w3-button w3-display-topright">&times;</span>
				<h3 class="p-1">Editar información del álbum</h3>
   		</header>
   		<div class="w3-cell-row">
   			<div class="w3-cell w3-cell-middle text-center">
   				<img src="{{asset('imagenes/carpeta-64.png')}}" width="64" height="64">
   			</div>
   			<div class="w3-cell w3-cell-middle">
   				<form method="POST" action="{{$album->id}}" style="width:100%">
					@method('PUT')
					@csrf
						<label>Nombre:</label>
						@if($errors->has('nombreAlbum'))
							@foreach($errors->get('nombreAlbum') as $error)
								<small class="text-danger"><strong>{{$error}}</strong></small>
							@endforeach
						@endif
						<br>
						<input class="easyui-textbox" name="nombreAlbum" value="{{$album->nombre_album}}" style="width:550px;max-width:200px"><br>
						<label>Descripción:</label>
						@if($errors->has('descripcion'))
							@foreach($errors->get('descripcion') as $error)
								<small class="text-danger"><strong>{{$error}}</strong></small>
							@endforeach
						@endif
						<br>
						<input class="easyui-textbox" name="descripcion" value="{{$album->descripcion}}" style="height:40px;width:550px;max-width:200px"><br>
						<button class="easyui-linkbutton mt-2">Actualizar</button>
					</form>
   			</div>
		</div>
	</div>
</div>
