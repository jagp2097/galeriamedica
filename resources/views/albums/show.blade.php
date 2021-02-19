@extends('layouts.app2')
@section('content')

	@section('icons')
		@include('layouts.iconOpciones')
		@include('layouts.iconInfo')
	@endsection

	@include('layouts.sideOpciones')
{{-- Informacion del album id="sidebar"--}}
	<div class="sidebar w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-container text-center w3-padding">
		<h5 class="m-2 mb-3 text-center">Información del álbum</h5>
		<p class="m-2"><strong>Descripción:</strong> {{ $album->descripcion }}</p>
		<p class="m-2"><strong>Fecha de creación:</strong> {{ $album->created_at }}</p>
		<p class="m-2"><strong>Cantidad de archivos:</strong> {{ $album->archivos->count() }}</p>
		@can('update', $album)
			<a href="#" class="easyui-linkbutton" style="width:100%" data-options="iconCls: 'icon-edit'" onclick="document.getElementById('winEditar').style.display='block'">Editar álbum</a>
		@endcan
		@can('delete', $album)
			<a href="#" class="easyui-linkbutton" style="width:100%" data-options="iconCls: 'icon-cancel'" onclick="document.getElementById('winEliminarAlbum').style.display='block'">Eliminar álbum</a>
		@endcan
		@can('create', galeriamedica\Archivo::class)
			<a class="easyui-linkbutton" style="width:100%" data-options="iconCls: 'icon-add'" onclick="document.getElementById('winAgregarArchivo').style.display='block'">Agregar archivo</a>
		@endcan	
		<a href="{{ route('paciente.show', ['id' => $album->paciente_id]) }}" class="easyui-linkbutton" style="position:absolute; bottom:12px; right:10px;" data-options="iconCls:'icon-back'" href="#">Regresar a los álbumes</a>		
	</div>
{{-- Fin Informacion del album --}}

	@section('overlay')
		<div class="overlays w3-overlay w3-hide-large" onclick="closeSideOpciones(), closeSideInfo()" style="cursor:pointer"></div>
	@endsection

<div class="w3-main w3-padding-64" style="margin-left:250px;margin-top:11px;background-color:#e5e5e5">
	<div id="alert">

	</div>

	@if (session('status'))
	<div class="alert alert-info" role="alert">
  	{{ session('status') }}
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
	</div>
	@endif

	<div class="container mt-2">
		<div class="card" style="width:100%; height:100%">
		<div class="container">
			<div class="row">
					<div class="container mt-2"><h2>Álbum: {{ $album->nombre_album }}</h2></div>		
						@include('archivos.index')
				</div>
			</div>
			</div>
		</div>	
	</div>

			@include('albums.edit')
			@include('albums.eliminar')
			@include('archivos.create')
@endsection

