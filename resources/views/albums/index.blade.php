{{-- Cada album paciente --}}
<h3 class="text-center m-3">Álbumes</h3>
<div class="row container mb-2">
@foreach($paciente->albums as $album)
	<div class="col-md-4 mb-2">
		<a style="text-decoration: none; color: black" href="{{route('album.show', ['id' => $album-> id], ['idpac' => $paciente-> id])}}">
		<div class="d-flex flew-row border">
			<div class="d-flex align-items-center">
				<img class="rounded float-right" src="{{asset('imagenes/carpeta-64.png')}}">
			</div>
			<div class="pl-2 pt-2 pr-2 pb-2 w-75">
				<h5 class="card-text">{{$album ->nombre_album}}</h5>
				<p class="w3-small" style="margin:2px"><strong>Descripción:</strong> {{$album->descripcion}}</p>
				<p class="w3-small" style="margin:2px"><strong>Cantidad de archivos:</strong> {{$album->archivos->count()}}</p>
				<p class="card-text w3-small" style="margin:2px"><strong>Fecha de creación: </strong>{{$album->created_at}}</p>
			</div>
		</div>
		</a>
	</div>
@endforeach
</div>
{{-- Fin Cada album paciente --}}
