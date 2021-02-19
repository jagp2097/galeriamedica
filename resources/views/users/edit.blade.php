@extends('layouts.app2')

@section('content')

<div data-options="region:'center'" title="" style="background:#eee;">
	<div class="container mt-2">
		<div class="card" style="width:100%;height:100%">
			<h2 class="m-3">Editar información</h2>
			<div class="container">
				<form class="text-center" method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
			@csrf
			@method('PUT')
				<div>
					<label>Nombre(s):</label>
					@if ($errors->has('nombre'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('nombre') }}</strong>
         		</small>
          @endif
					<p><input class="easyui-textbox" name="name" value="{{$user->name}}" style="width:300px"></p>
					
					<label>Nombre de usuario:</label>
					@if ($errors->has('username'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('username') }}</strong>
         		</small>
          @endif
					<p><input class="easyui-textbox" name="username" value="{{$user->username}}" style="width:300px"></p>
					
					<label>E-mail:</label>
					@if ($errors->has('email'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('email') }}</strong>
         		</small>
          @endif
					<p><input class="easyui-textbox" name="email" value="{{$user->email}}" style="width:300px"></p>
					
					<label>Contraseña</label>
					@if ($errors->has('password'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('password') }}</strong>
         		</small>
          @endif
					<p><input id="password" style="width:300px" type="password" class="easyui-textbox" name="password"></p>
          <label>Confirmar contraseña</label>
          <p><input id="password-confirm" style="width:300px" type="password" class="easyui-textbox" name="password_confirmation"></p>

          @can('cambiarTipoUsuario', galeriamedica\User::class)

          <label><strong>Rol actual: </strong>{{$user->type}}</label><br>
						@if($errors->has('rol'))
							@foreach($errors->get('rol') as $error)
								<small class="text-danger"><span>{{$error}}</span></small>			
							@endforeach
						@endif
						
					<label>Administrador<input style="margin:8px;" type="radio" name='rol' value="Admin" @if($user->type == 'Admin')checked @endif></label>
					<label>Usuario<input style="margin:8px;" type="radio" name='rol' value="Usuario" @if($user->type == 'Usuario')checked @endif></label>
					@endcan
					<br>
			                       
					<button class="easyui-linkbutton mb-2" style="width: 120px">Editar</button>
			  </div>
			  </form>
			</div>			
		</div>		
	</div>
</div>

{{--
	          <label><strong>Rol actual: </strong>{{$user->type}}</label><br>
						@if($errors->has('rol'))
							@foreach($errors->get('rol') as $error)
								<small class="text-danger"><span>{{$error}}</span></small>			
							@endforeach
						@endif
						
							<label>Administrador<input style="margin:8px;" type="radio" name='rol' value="Admin" @if($user->type == 'Admin')checked @endif></label>
							<label>Usuario<input style="margin:8px;" type="radio" name='rol' value="Usuario" @if($user->type == 'Usuario')checked @endif></label>

							--}}

@endsection
