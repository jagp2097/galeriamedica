<div class="remodal" data-remodal-id="{{$id}}">
	<button data-remodal-action="close" class="remodal-close"></button>
	<div class="row">
		<div class="col-md-6 mt-2">
		@if($tipo == 'Foto')
			<div class="contArchivos">
				<a>
					<img class="img-fluid img-thumbnail" src="{{asset('imagenes/')}}/{{$ref}}">
				</a>
				<div class="overlay">
					<a class="image-link icon" href="{{asset('imagenes/')}}/{{$ref}}">
						<i data-remodal-action="confirm" class="fa fa-expand"></i>
					</a>
				</div>
			</div>
		@elseif($tipo == 'Video')
			<div class="contArchivos">
				<a>
					<video class="img-fluid"> 
						<source src="{{asset('imagenes/')}}/{{$ref}}">
					</video>
				</a>
				<div class="overlay">
					<a class="video-link icon" href="{{asset('imagenes/')}}/{{$ref}}">
						<i data-remodal-action="confirm" class="fa fa-expand"></i>
					</a>
				</div>
			</div>
		@endif
		@can('update', $archivo)
			<p style="width:100%;"><a id="{{$id}}" data-remodal-action="confirm" class="oso easyui-linkbutton" data-options="iconCls:'icon-edit'" onclick="mostrar(this, r='{{route('archivo.edit', $id)}}');">Editar información del archivo</a> </p>
		@endcan

		@can('delete', $archivo)
			<p style="width:100%;"><a data-remodal-action="confirm" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'"
			onclick="document.getElementById('winElArch{{$id}}').style.display='block'">Eliminar archivo</a></p>
		@endcan
		</div>
		<div class="col-md-6 mt-2">
			<label><strong>Nombre del archivo:</strong> {{$nomFoto}}</label><br>
			<label><strong>Clínica:</strong> {{$pat}}</label><br>
			<label><strong>Diagnostico:</strong> {{$diag}}</label><br>
			<label><strong>Región:</strong> {{$reg}}</label><br>
			<label><strong>Periodo:</strong> {{$per}}</label><br>
			<label><strong>Tipo de archivo:</strong> {{$tipo}}</label><br>
			<label><strong>Álbum:</strong> {{$album->nombre_album}}</label><br>
			<label><strong>Creado:</strong> {{$soloFecha}}</label><br>
			<a class="easyui-linkbutton" href="{{ route('archivo.download', ['ref' => $ref]) }}">Descargar</a>
		</div>
		</div>
</div>


		@can('delete', $archivo)
			@includeIf('archivos.delete')
		@endcan
