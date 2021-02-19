<div class="container">
<div id="winEliminar" class="w3-modal">
	<div class="w3-modal-content w3-container w3-padding w3-margin-top" style="max-width:550px">
			<header style="background-color:#B3DFDA"> 
		<h3 class="p-1">Eliminar paciente</h3>
   </header>
		<div class="text-center mb-2">
			<p class="p-2">¿Estás seguro que quieres eliminar a <strong>{{ $paciente->nombreCompleto }}</strong>?</p>
			<form method="POST" action="{{ route('paciente.destroy', ['id' => $paciente->id]) }}">
			@method('DELETE')
			@csrf
				<button class="easyui-linkbutton" style="width:35px">Si</button>
				<a class="easyui-linkbutton" style="width:35px"  onclick="document.getElementById('winEliminar').style.display='none'">No</a> 
			</form>
    </div>
	</div>
</div>
</div>