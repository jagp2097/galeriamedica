@extends('layouts.app2')

@section('icons')
	@include('layouts.iconOpciones')
@endsection

@section('content')

<div class="w3-main w3-padding-64" style="margin-top:11px;background-color:#e5e5e5">
	<div class="col-md-2 col-md-offset-2"></div>
  <div class="col-md-8 col-md-offset-3 container py-3">
    <div class="card" style="width:100%;">
    	<h2 class="m-2 mt-2">Editar información de mi cuenta</h2>
    	<form class="text-center" method="POST" action="{{ route('user.passwordUpdate') }}">
			@csrf
			@method('PUT')
				<div>
					<label>Nombre(s):</label>
					@if ($errors->has('nombre'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('nombre') }}</strong>
         		</small>
          @endif
					<p><input class="easyui-textbox" name="name" value="{{$user->name}}" style="width:65%"></p>
					
					<label>Nombre de usuario:</label>
					@if ($errors->has('username'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('username') }}</strong>
         		</small>
          @endif
					<p><input class="easyui-textbox" name="username" value="{{$user->username}}" style="width:65%"></p>
					
					<label>E-mail:</label>
					@if ($errors->has('email'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('email') }}</strong>
         		</small>
          @endif
					<p><input class="easyui-textbox" name="email" value="{{$user->email}}" style="width:65%"></p>

					<label>Contraseña antigua:</label>
					<small class="text-danger">
          	<strong>{{ session('password-antiguo') }}</strong>
         	</small>
					<p><input style="width:65%" type="password" class="easyui-textbox" name="password-antiguo"></p>

					<label>Nueva contraseña:</label>
					@if ($errors->has('password-nuevo'))
          	<small class="text-danger">
          		<strong>{{ $errors->first('password-nuevo') }}</strong>
         		</small>
          @endif
					<p><input style="width:65%" type="password" class="easyui-textbox" name="password-nuevo"></p>

          <label>Confirmar nueva contraseña:</label>
          <p><input style="width:65%" type="password" class="easyui-textbox" name="password-nuevo_confirmation"></p>
			                       
					<button class="easyui-linkbutton mb-2" style="width: 120px">Editar</button>
			  </div>
			  </form>    
  	</div>
  <div class="col-md-2 col-md-offset-2"></div>
	</div>
</div>

	@include('layouts.sideOpciones')

	@section('overlay')
		<div class="overlays w3-overlay w3-hide-large" onclick="closeSideOpciones()" style="cursor:pointer"></div>
	@endsection

@endsection
