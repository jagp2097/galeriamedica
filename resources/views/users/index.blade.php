@extends('layouts.app2')
@section('content')

@section('icons')
	@include('layouts.iconOpciones')
	@include('layouts.iconBusqueda')
@endsection
{{-- Buscar Usuarios de la aplicacion --}}
	<div id="sideBusqueda" class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-container text-center p-3">
		<a id="aBusqueda" class="mb-2" href="#" onclick="alternarBusqueda()">Buscar usuario</a>
			<form id="busqueda" method="GET" action="{{ route('user.index') }}">
				<input id="ssBusquedaUsuario" name="nombre">
			</form>
			<p><a style="width:215px" class="easyui-linkbutton mt-5" href="{{ route('paciente.index') }}" data-options="iconCls:'icon-back'">Ir a la lista de pacientes</a></p>				
	</div>
{{-- Fin Buscar Usuarios de la aplicacion --}}
	@include('layouts.sideOpciones')

	@section('overlay')
		<div class="overlays w3-overlay w3-hide-large" onclick="closeSideBusqueda(), closeSideOpciones()" style="cursor:pointer"></div>
	@endsection
{{-- Usuarios de la aplicacion --}}
<div class="w3-main w3-padding-64" style="margin-left:250px;margin-top:11px;background-color:#e5e5e5">

	@if (session('status'))
			<div class="alert alert-info" role="alert">
        	{{ session('status') }}
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
			</div>
	@endif
	
	<div class="w3-responsive" style="width:100%;height:100%">
		<table class="w3-table-all w3-hoverable w3-centered">
		<thead>
			<tr>
					<th style="width:1%"></th>
			    <th>Nombre</th>
			    <th>Nombre de usuario</th>
			    <th>E-mail</th>
			    <th>Rol</th>
			    <th></th>
		  </tr>
	  </thead>
	  <tbody>
	  	@php
		  	$cont = 1 
		  @endphp
	  @foreach($users as $user)
	   	<tr>
		    	<td>{{ $cont++ }}</td>
	    		<td class="tdPac">{{ $user -> name }}</td>
	    		<td class="tdNom">{{ $user -> username }}</td>
	    		<td class="tdEmail">{{ $user -> email }}</td>
	    		<td class="tdApp">{{ $user -> type }}</td>
	    		<td class="text-center">
	    			<a class="easyui-linkbutton" href="{{ route('user.rol', ['id' => $user->id]) }}">Editar tipo de usuario</a>
	    		</td>
	    </tr>
		@endforeach
	  </tbody>
	</table>		
	</div>
	
</div>

@endsection