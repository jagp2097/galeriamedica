@extends('layouts.app2')
@section('content')

@section('icons')
	@include('layouts.iconOpciones')
@endsection

<div class="w3-main w3-padding-64" style="margin-top:11px;background-color:#e5e5e5">

	@if (session('status'))
	<div class="alert alert-info" role="alert">
        {{ session('status') }}
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
  	</button>
	</div>
	@endif

	<div class="container mt-2">
		<div class="card" style="width:100%;height:100%">
			<h2 class="m-3">Información del usuario</h2>
			<div class="container">
								<div class="row">
					<div class="col-md-6">
						<label>Nombre: {{$user->name}}</label><br>
						<label>Nombre de usuario: {{$user->username}}</label><br>
						<label>E-mail: {{$user->email}}</label><br>
					</div>
					<div class="col-md-6 text-center">
						@can('delete', $user)
						<a class="easyui-linkbutton" data-options="iconCls: 'icon-cancel'" onclick="document.getElementById('winEliminar').style.display='block'">Eliminar cuenta</a>
						@endcan
						<a class="easyui-linkbutton" data-options="iconCls: 'icon-edit'" href="{{route('user.password', $user->id)}}">Editar información de mi cuenta</a>
					</div>					
				</div>
			</div>			
		</div>		
	</div>	
</div>


<div class="container">
	<div id="winEliminar" class="w3-modal">
		<div class="w3-modal-content w3-container w3-padding w3-margin-top" style="max-width:550px">
				<header style="background-color:#B3DFDA"> 
			<h3 class="p-1">Eliminar cuenta</h3>
	   </header>
			<div class="text-center mb-2">
				<p class="p-2">¿Estás seguro que quieres eliminar la cuenta de <strong>{{ $user->name }}</strong>?</p>
				<form method="POST" action="{{ route('user.destroy', ['id' => $user->id]) }}">
					@method('DELETE')
					@csrf
						<button class="easyui-linkbutton" style="width:35px">Si</button>
						<a class="easyui-linkbutton" onclick="document.getElementById('winEliminar').style.display='none'">No</a> 
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

