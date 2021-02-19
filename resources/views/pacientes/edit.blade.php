{{-- @extends('layouts.app2')

@section('content')

	<div class="container mt-5">
		<div class="card" style="width:100%">
			<h2 class="m-3">Editar información del paciente</h2>
			<form class="text-center" method="POST" action="/pacientes/{{ $paciente->id }}">
			@csrf
			@method('PUT')
				<div>
					<label>Número de registro:</label>
					<p><input class="easyui-textbox" name="registro" value="{{$paciente->registro}}" style="width:300px"></p>
					<label>Nombre(s):</label>
					<p><input class="easyui-textbox" name="nombre" value="{{$paciente->nombre}}" style="width:300px"></p>
					<label>Apellido Paterno:</label>
					<p><input class="easyui-textbox" name="apellido_paterno" value="{{$paciente->app}}" style="width:300px"></p>
					<label>Apellido Materno:</label>
					<p><input class="easyui-textbox" name='apellido_materno' value="{{$paciente->apm}}" style="width:300px"></p><br>
					<button class="easyui-linkbutton mb-2" style="width: 120px">Editar</button>
			   	</div>
			</form>	  				
		</div>		
	</div>

@endsection
--}}