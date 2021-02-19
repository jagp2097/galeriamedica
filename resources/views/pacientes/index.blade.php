@extends('layouts.app2')
@section('content')

@section('icons')
	
	@include('layouts.iconOpciones')
	@include('layouts.iconBusqueda')

@endsection

{{-- Busquedas id="sidebar"--}}
	<div id="sideBusqueda" class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-container text-center p-3">
		<a id="aBusqueda" href="#" onclick="alternarBusqueda()">Busqueda por archivo</a>
			<form id="busqueda" method="GET" action="{{ route('paciente.index') }}">
				<input id="ssBusqueda" name="nombre">
				<input id="ccPatologiaBusqueda" name="patologiaBusqueda">
				<input id="ccDiagnosticoBusqueda" name="diagnosticoBusqueda">
				<input id="ccRegionBusqueda" name="regionBusqueda">
				<input id="ccPeriodoBusqueda" name="periodoBusqueda">
				<input id="ccArchivoBusqueda" name="tipoArchivoBusqueda">
				{{--<input id="ddFecha" type="text" name="fechaBusqueda">--}}
				<input id="bMes" name="mes">
				<a id="ssBusquedaFoto" style="width:50%"></a>
			</form>
			@can('create', galeriamedica\Paciente::class)
				<a class="easyui-linkbutton mt-2 mb-2" href="{{ route('paciente.create') }}" data-options="iconCls:'icon-add'">Agregar paciente</a>
			@endcan
	</div>
{{-- Fin Busquedas --}}

	@include('layouts.sideOpciones')

	@section('overlay')
		<div class="overlays w3-overlay w3-hide-large" onclick="closeSideBusqueda(), closeSideOpciones()" style="cursor:pointer"></div>
	@endsection


<div class="w3-main w3-padding-64" style="margin-left:250px;margin-top:11px;background-color:#e5e5e5">
	
	@if (session('status'))
	<div class="alert alert-info" role="alert">
        {{ session('status') }}
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
	</div>
	@endif

	{{-- Busqueda por archivos --}}
	@if($pacientes->isNotEmpty() && $pacientes->first()->ref_foto)
	<div class="container mt-2">
	<div class="card" style="width:100%;height:100%">
		<div class="w3-container mt-2">
			<h2>Archivos</h2>
			<small style="font-size:15px">Se encontraron {{$pacientes->count()}} resultados</small>
		</div>
		<div class="w3-container text-center">
			<div class="row mb-2">
				@foreach($pacientes as $archivo)
				<div class="col-md-2 mb-2">
					@if($archivo->tipo_archivo == 'Foto')
					<div class="contArchivos">
						<a href="#{{$archivo->id}}"><img class="img-fluid" src="{{asset('imagenes/')}}/{{$archivo->ref_foto}}"></a>
						<div class="overlay">
					  	<a href="#{{$archivo->id}}" class="icon" style="text-decoration:none"><i class="fa fa-file-photo-o"></i></a>
					  </div>
					</div>
					@elseif($archivo->tipo_archivo == 'Video')
					<div class="contArchivos">
						<a href="#{{$archivo->id}}">
							<video class="img-fluid"> 
								<source src="{{asset('imagenes/')}}/{{$archivo->ref_foto}}">
							</video>
						</a>
						<div class="overlay">
					  	<a href="#{{$archivo->id}}" class="icon"><i class="fa fa-file-video-o"></i></a>
					  </div>
					</div>
					@endif
				</div>

				{{-- Remodal --}}
				<div class="remodal" data-remodal-id="{{$archivo->id}}">
					<button data-remodal-action="close" class="remodal-close"></button>
					<div class="row text-center">
						<div class="col-md-6 mt-2">
						@if($archivo->tipo_archivo == 'Foto')
							<div class="contArchivos">
								<a><img class="img-fluid" src="{{asset('imagenes/')}}/{{$archivo->ref_foto}}"></a>
								<div class="overlay">
									<a class="image-link icon" href="{{asset('imagenes/')}}/{{$archivo->ref_foto}}">
										<i data-remodal-action="confirm" class="fa fa-expand"></i>
									</a>
								</div>
							</div>

						@elseif($archivo->tipo_archivo == 'Video')
							<div class="contArchivos">
								<a>
									<video class="img-fluid"> 
										<source src="{{asset('imagenes/')}}/{{$archivo->ref_foto}}">
									</video>
								</a>
								<div class="overlay">
									<a class="video-link icon" href="{{asset('imagenes/')}}/{{$archivo->ref_foto}}">
										<i data-remodal-action="confirm" class="fa fa-expand"></i>
									</a>
								</div>
							</div>
						@endif
						</div>
						<div class="col-md-6 mt-2">
						 	<label><strong>Nombre del archivo:</strong> {{$archivo-> nombre_foto}}</label><br>
							<label><strong>Clínica:</strong> {{$archivo-> patologia}}</label><br>
							<label><strong>Diagnostico:</strong> {{$archivo-> diagnostico}}</label><br>
							<label><strong>Región:</strong> {{$archivo-> region}}</label><br>
							<label><strong>Periodo:</strong> {{$archivo-> periodo}}</label><br>
							<label><strong>Paciente:</strong> {{ $albObj::find($archivo->album_id)->paciente->nombreCompleto }}</label><br>
							<label><strong>Álbum:</strong> {{ $albObj::find($archivo->album_id)->nombre_album }}</label><br>
							<label><strong>Creado:</strong> {{$archivo-> created_at}}</label><br>
							<a class="easyui-linkbutton" href="{{ route('archivo.download', ['ref' => $archivo->ref_foto]) }}">Descargar</a>
						</div>
				</div>
				<br>
			</div> 
				@endforeach
			</div>
		</div>
	</div>
</div>

{{-- Sin resultados --}}
	@elseif(!($pacientes->isNotEmpty()))	
	<div class="container mt-2">
		<div class="card" style="width:100%;height:100%">
			<div class="w3-container mt-2">
				<small style="font-size:25px">No se encontraron resultados.</small>
			</div>
		</div>
	</div>
	
	{{-- Busqueda por paciente --}}
	@else
	<div class="w3-responsive" style="width:100%;height:100%">
		<table class="w3-table-all w3-hoverable w3-centered">
			<thead>
				<tr>
				 	<th style="width:1%"></th>
				 	<th style="width:15%">No. Registro</th>
					<th style="width:20%">Nombre(s)</th>
					<th style="width:20%">Apellido Paterno</th>
					<th style="width:20%">Apellido Materno</th>
					<th style="width:10%">Álbumes</th>
					@can('columnaOpciones', galeriamedica\Paciente::class)
					<th style="width:15%"></th>				    
					@endcan
			  </tr>
		    </thead>
		    <tbody>
		    	@php
		    		 $cont = 1 
		    	@endphp
		    	@foreach($pacientes as $paciente)
		    		<tr>
		    			<td>{{ $cont++ }}</td>
		    			<td class="tdPac">{{ $paciente -> registro }}</td>
		    			<td class="tdNom">{{ $paciente -> nombre }}</td>
		    			<td class="tdApp">{{ $paciente -> app }}</td>
		    			<td class="tdApm">{{ $paciente -> apm }}</td>
		    			<td class="tdAlbum">{{ $paciente->albums->count() }}</td>
		    			<td class="text-center">
								@can('view', $paciente)
								<a class="easyui-linkbutton" href="{{ route('paciente.show', ['id' => $paciente->id]) }}">Detalles</a>
								@endcan	    					
		    				@can('update', $paciente)
		    				<a class="easyui-linkbutton" href="{{ route('paciente.edit', ['id' => $paciente->id]) }}">Editar</a>
		    				@endcan
		    			</td>
		    		</tr>
					@endforeach
		    	</tbody>
			</table>
		</div>
		@endif
	</div>
					
@endsection
