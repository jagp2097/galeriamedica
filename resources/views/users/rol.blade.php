@extends('layouts.app2')

@section('icons')
	@include('layouts.iconOpciones')
@endsection

@section('content')

<div class="w3-main w3-padding-64" style="margin-top:11px;background-color:#e5e5e5">
	<div class="container mt-2">
		<div class="card" style="width:100%;height:100%">
			<h2 class="m-3">Editar rol del usuario</h2>
			<div class="container">
				<form class="text-center" method="POST" action="{{ route('user.rolUpdate', ['id' => $user->id]) }}">
			@csrf
			@method('PUT')
				<div>
					<label><strong>Nombre(s):</strong> {{$user->name}}</label><br>
					
					<label><strong>Nombre de usuario:</strong> {{$user->username}}</label><br>
					
					<label><strong>E-mail:</strong> {{$user->email}}</label><br>
					
          <label><strong>Rol actual: </strong>{{$user->type}}</label><br>
						@if($errors->has('rol'))
							@foreach($errors->get('rol') as $error)
								<small class="text-danger"><span>{{$error}}</span></small>			
							@endforeach
						@endif
						
					<label>Administrador<input style="margin:8px;" type="radio" name='rol' value="Admin" @if($user->type == 'Admin')checked @endif></label>
					<label>Usuario<input style="margin:8px;" type="radio" name='rol' value="Usuario" @if($user->type == 'Usuario')checked @endif></label>
					<br>
			                       
					<button class="easyui-linkbutton mb-2" style="width: 120px">Editar</button>
			  </div>
			  </form>
			</div>			
		</div>		
	</div>	
</div>

	@include('layouts.sideOpciones')

	@section('overlay')
		<div class="overlays w3-overlay w3-hide-large" onclick="closeSideOpciones()" style="cursor:pointer"></div>
	@endsection

@endsection
