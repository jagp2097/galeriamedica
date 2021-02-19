@extends('layouts.app2')
@section('content')

@section('icons')
	@include('layouts.iconOpciones')
	@include('layouts.iconInfo')
@endsection

	@include('layouts.sideOpciones')
	
{{-- Informacio del paciente  id="sidebar" --}}
	<div class="sidebar w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-container text-center w3-padding">
		<h5 class="m-3 text-center">{{$paciente->nombreCompleto}}</h5>
		<p class="text-center">No. registro: {{$paciente->registro}}</p>
		@can('create', galeriamedica\Album::class)
		<a class="easyui-linkbutton" data-options="iconCls: 'icon-add'" style="width:100%" onclick="document.getElementById('winNuevaCarpeta').style.display='block'">Crear álbum</a>
		@endcan
		@can('update', $paciente)
			<a class="easyui-linkbutton" data-options="iconCls:'icon-edit'" style="width:100%" href="{{ route('paciente.edit', ['id' => $paciente->id]) }}">Editar paciente</a>
	  @endcan
		@can('delete', $paciente)
			<a class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" style="width:100%" onclick="document.getElementById('winEliminar').style.display='block'">Eliminar paciente</a>
		@endcan
		<a href="{{ route('paciente.index') }}" class="easyui-linkbutton" style="position:absolute; bottom:12px; right:10px;" data-options="iconCls:'icon-back'" href="#">Regresar a la búsqueda</a>
	</div>
{{-- Fin Informacio del paciente --}}

	@section('overlay')
		<div class="overlays w3-overlay w3-hide-large" onclick="closeSideOpciones(), closeSideInfo()" style="cursor:pointer"></div>
	@endsection

{{-- ALbumes del paciente --}}
<div class="w3-main w3-padding-64" style="margin-left:250px;margin-top:11px;background-color:#e5e5e5">

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
					<div class="col-md-3">
					@include('pacientes.delete')
					@include('albums.create')	
					</div>
				</div>
			</div>
	@include('albums.index')			
		</div>		
	</div>	
</div>
@endsection
{{-- Fin ALbumes del paciente --}}


