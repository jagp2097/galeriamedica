<div class="container">
	<div id="winEdArch" class="w3-modal">
		<div class="w3-modal-content w3-container w3-padding w3-margin-top" style="max-width:500px">
			<header style="background-color:#B3DFDA"> 
				<span onclick="document.getElementById('winEdArch').style.display='none'" class="m-2 w3-button w3-display-topright">&times;</span>
				<h3 class="p-1">Editar información del archivo</h3>
   		</header>
   		<div class="w3-cell-row">
   			<div class="w3-cell w3-cell-middle">
   				<form id="formAct" method="POST" action="" enctype="multipart/form-data">
						@method('PUT')	
						@csrf
						<input id="nombreArchivo" class="easyui-textbox" data-options="label:'Nombre',labelPosition:'top',labelAlign:'left'" style="width:250px;">
						<small class="text-danger"><strong id="EnombreArchivo"></strong></small>

						<div id="clinicaEdit">
							<input id="patologia" class="ccPatologia" name="patologia" style="width:180px;">
							<small class=" text-danger"><strong id="Epatologia"></strong></small>
						</div>

						<div id="clinicaOtroEdit">
							<input id="patologiaOtro" class="txPatologiaOtro" name="patologia" style="width:180px;">
							<a id="clinicaOtroNoEdit" class="easyui-linkbutton" data-options="iconCls:'icon-no'"href="#"></a>
							<small class="text-danger"><strong id="EpatologiaOtro"></strong></small>
						</div>

						<div id="diagnosticoEdit">
							<input id="diagnostico" class="ccDiagnostico" name="diagnostico" style="width:180px;">
							<small class="text-danger"><strong id="Ediagnostico"></strong></small>
						</div>

						<div id="diagnosticoOtroEdit">
							<input id="diagnosticoOtro" class="txDiagnosticoOtro" name="diagnostico" style="width:180px;">
							<a id="diagOtroNoEdit" class="easyui-linkbutton" data-options="iconCls:'icon-no'"href="#"></a>
							<small class="text-danger"><strong id="EdiagnosticoOtro"></strong></small>
						</div>

						<input id="region" class="ccRegion" name="region" style="width:180px;">
						<small class="text-danger"><strong id="Eregion"></strong></small>

						<input id="periodo" class="ccPeriodo" name="periodo" style="width:180px;">
						<small class="text-danger"><strong id="Eperiodo"></strong></small>

						{{-- <input id="tipoArchivo" class="ccArchivo" name="tipoArchivo">
						<small class="text-danger"><strong id="EtipoArchivo"></strong></small> --}}

						<input id="id" type="hidden" name="id">

						<div class="text-center pb-1">
							<a href="#" id="actualizar" class="easyui-linkbutton mt-2" onclick="actualizar(formAct, r='{{route('archivo.update', [$id='id'])}}')" style="width:80px">Actualizar</a> 
						</div>
	

					</form>
   				
   			</div>
		</div>
	</div>
</div>

