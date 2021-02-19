<div class="container">
<div id="winEliminarAlbum" class="w3-modal">
	<div class="w3-modal-content w3-container w3-padding w3-margin-top" style="max-width:550px">
			<header style="background-color:#B3DFDA"> 
		<h3 class="p-1">Eliminar álbum</h3>
   </header>
		<div class="text-center mb-2">
			<p class="p-2">¿Estás seguro que quieres el álbum <strong>{{ $album -> nombre_album }}</strong>?</p>
			<form method="POST" action="{{ route('album.destroy', ['id' => $album-> id]) }}">
			@method('DELETE')
			@csrf
				<button class="easyui-linkbutton" style="width:35px">Si</button>
				<a class="easyui-linkbutton" style="width:35px" onclick="document.getElementById('winEliminarAlbum').style.display='none'">No</a> 
			</form>
    </div>
	</div>
</div>
</div>