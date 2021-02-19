@extends('layouts.app2')
@section('content')

@section('icons')
	@include('layouts.iconOpciones')
@endsection

@include('layouts.sideOpciones')

@section('overlay')
	<div class="overlays w3-overlay w3-hide-large" onclick="closeSideOpciones()" style="cursor:pointer"></div>
@endsection

<div class="w3-main w3-padding-64" style="margin-top:11px;background-color:#e5e5e5">
	<div class="col-md-2 col-md-offset-2"></div>
  <div class="col-md-8 col-md-offset-3 container py-3">
    <div class="card" style="width:100%;">
    @if($paciente->exists)
  	<h2 class="m-2 mt-2">Editar información del paciente</h2>
	@else
    <h2 class="m-2 mt-2">Agregar paciente</h2>
	@endif

	@if($paciente->exists)
    <form class="text-center" method="POST" action="{{ route('paciente.update', ['id' => $paciente->id]) }}">
    @method('PUT')
    @php 
    $registroEdit = $paciente->registro;
    $nombreEdit = $paciente->nombre;
    $appEdit = $paciente->app;
    $apmEdit = $paciente->apm;
    @endphp
	@else
    <form class="text-center" method="POST" action="{{ route('paciente.store') }}">
	@endif
		@csrf
		<div class="mx-5">
			<label>Número de registro:</label>
			@if($errors->has('registro'))
				@foreach($errors->get('registro') as $error)
				<small class="text-danger"><strong>{{$error}}</strong></small>
				@endforeach
			@endif
			<p><input class="easyui-textbox" name="registro" @if($paciente->exists) value="{{$registroEdit}}" data-options="disabled:true" @endif style="width:75%"></p>

			<label>Nombre(s):</label>
			@if($errors->has('nombre'))
				@foreach($errors->get('nombre') as $error)
					<small class="text-danger"><strong>{{$error}}</strong></small>
				@endforeach
			@endif
			<p><input class="easyui-textbox" name="nombre" @if($paciente->exists) value="{{$nombreEdit}}" @endif style="width:75%"></p>

			<label>Apellido Paterno:</label>
			@if($errors->has('apellido_paterno'))
				@foreach($errors->get('apellido_paterno') as $error)
					<small class="text-danger"><strong>{{$error}}</strong></small>
				@endforeach
			@endif
			<p><input class="easyui-textbox" name="apellido_paterno" @if($paciente->exists) value="{{$appEdit}}" @endif style="width:75%"></p>

			<label>Apellido Materno:</label>
			@if($errors->has('apellido_materno'))
				@foreach($errors->get('apellido_materno') as $error)
					<small class="text-danger"><strong>{{$error}}</strong></small>
				@endforeach
			@endif
			<p><input class="easyui-textbox" name='apellido_materno' @if($paciente->exists) value="{{$apmEdit}}" @endif style="width:75%"></p><br>
					
			@if($paciente->exists) 
				<button class="easyui-linkbutton mb-5" style="width:120px">Actualizar</button>
			@else
				<button class="easyui-linkbutton mb-5" style="width:120px">Agregar</button>
			@endif

	</div>
	<a href="{{route('paciente.index')}}" class="easyui-linkbutton w3-display-bottomleft" data-options="iconCls:'icon-back'" href="#">Regresar a la búsqueda de pacientes</a>
		</form>
    
  	</div>
  <div class="col-md-2 col-md-offset-2"></div>
	</div>
</div>

@endsection
