@extends('layouts.app2')
@section('content')

<div class="container mt-5">
	<div class="card" style="width:100%">
	@if($user->exists)
  	<h2 class="m-3">Editar tipo de usuario</h2>
	@else
    <h2 class="m-3">Agregar usuario</h2>
	@endif

@if($user->exists)
		<form class="m-3" method="POST" action="{{ route('user.update', ['id' => $user->id] ) }}">
    @method('PUT')
    @php 
    $nameEdit = $user->name;
    $userNameEdit = $user->username;
    $emailEdit = $user->email;
    @endphp
@else
		<form class="" method="POST" action="{{ route('user.store') }}">
@endif
		@csrf
		@if($user->exists)
		<div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<label><strong>Nombre: </strong>{{$user->name}}</label><br>
						<label><strong>Nombre de usuario:</strong> {{$user->username}}</label><br>
						<label><strong>E-mail: </strong>{{$user->email}}</label><br>
						<label><strong>Rol actual: </strong>{{$user->type}}</label><br>
						@if($errors->has('rol'))
							@foreach($errors->get('rol') as $error)
								<small class="text-danger"><span>{{$error}}</span></small>			
							@endforeach
						@endif
						@foreach($roles as $rol)
							<p>
							<input type="radio" name='rol' value="{{$rol}}">{{$rol}}<br>
							</p>
						@endforeach
						<button class="easyui-linkbutton mb-3" style="width:120px">Editar</button>
					</div>					
				</div>
			</div>
			@endif
			{{--
			<label>Nombre:</label>
			<p><input class="easyui-textbox" name="name" @if($user->exists) value="{{$nameEdit}}" @endif style="width:300px"></p>

			<label>Nombre de usuario:</label>
			<p><input class="easyui-textbox" name="username" @if($user->exists) value="{{$userNameEdit}}" @endif style="width:300px"></p>

			<label>Email:</label>
			<p><input class="easyui-textbox" type="email" name="email" @if($user->exists) value="{{$emailEdit}}" @endif style="width:300px"></p>

			<label>Password:</label>
			<p><input class="easyui-textbox" name='password' style="width:300px"></p>

			<label>Rol:</label>
			@foreach($roles as $rol)
				<p><input type="radio" name='rol' value="{{$rol}}" style="width:300px">{{$rol}}</p>
			@endforeach

			@if($user->exists) 
				<button class="easyui-linkbutton mb-3" style="width:120px">Editar</button>
			@else
				<button class="easyui-linkbutton mb-3" style="width:120px">Crear</button>
			@endif		
	--}}
		</div>

		</form>
	</div>
</div>

@endsection