<div class="container">
	@if(!$errors->errorsArchivos->any())
	<div id="winAgregarArchivo" class="w3-modal">
	@else
	<div id="winAgregarArchivo" class="w3-modal">
		<script type="text/javascript">
			document.getElementById('winAgregarArchivo').style.display = 'block';
		</script>
	@endif
		<div class="w3-modal-content w3-container w3-padding w3-margin-top" style="max-width:500px">
			<header style="background-color:#B3DFDA"> 
				<span onclick="document.getElementById('winAgregarArchivo').style.display='none'" class="m-2 w3-button w3-display-topright">&times;</span>
				<h3 class="p-1">Agregar archivo</h3>
   		</header>
   		<div class="w3-cell-row">
   			<div class="w3-cell w3-cell-middle">
   				<form method="POST" action="{{ route('archivo.store', ['id' => $album->id]) }}" enctype="multipart/form-data">
					@csrf
						<input class="easyui-textbox" data-options="label:'Nombre',labelPosition:'top',labelAlign:'left'" name="nombreArchivo">
						@if($errors->errorsArchivos->has('nombreArchivo'))
							@foreach($errors->errorsArchivos->get('nombreArchivo') as $error)
								<small class="text-danger"><strong>{{$error}}</strong></small>
							@endforeach
						@endif

						<div id="divClinica">
							<input id="clinica" class="ccPatologia" name="patologia" style="width:180px;">
							
							@if($errors->errorsArchivos->has('patologia'))
								@foreach($errors->errorsArchivos->get('patologia') as $error)
									<small class="text-danger"><strong>{{$error}}</strong></small>
								@endforeach
							@endif
						</div>

						<div id="divClinicaOtro">
							<input class="txPatologiaOtro clinicaOtro" name="patologiaOtro" style="width:180px;">
							<a id="clinicaOtroNo" class="easyui-linkbutton" data-options="iconCls:'icon-no'"href="#"></a>
							
							@if($errors->errorsArchivos->has('patologiaOtro'))
								@foreach($errors->errorsArchivos->get('patologiaOtro') as $error)
									<small class="text-danger"><strong>{{$error}}</strong></small>
								@endforeach
							@endif
						</div>
			
						<div id="divDiag">
							<input class="ccDiagnostico" name="diagnostico" style="width:180px;">
							
							@if($errors->errorsArchivos->has('diagnostico'))
								@foreach($errors->errorsArchivos->get('diagnostico') as $error)
									<small class="text-danger"><strong>{{$error}}</strong></small>
								@endforeach
							@endif
						</div>

						<div id="divDiagOtro">
							<input class="txDiagnosticoOtro" name="diagnosticoOtro" style="width:180px;">
							<a id="diagOtroNo" class="easyui-linkbutton" data-options="iconCls:'icon-no'"href="#"></a>
							
							@if($errors->errorsArchivos->has('diagnosticoOtro'))
								@foreach($errors->errorsArchivos->get('diagnosticoOtro') as $error)
									<small class="text-danger"><strong>{{$error}}</strong></small>
								@endforeach
							@endif
						</div>

						<input class="ccRegion" name="region" style="width:180px;">
						
						@if($errors->errorsArchivos->has('region'))
							@foreach($errors->errorsArchivos->get('region') as $error)
								<small class="text-danger"><strong>{{$error}}</strong></small>
							@endforeach
						@endif

						<input class="ccPeriodo" name="periodo" style="width:180px;">
						
						@if($errors->errorsArchivos->has('periodo'))
							@foreach($errors->errorsArchivos->get('periodo') as $error)
								<small class="text-danger"><strong>{{$error}}</strong></small>
							@endforeach
						@endif

						<input class="ccArchivo" name="tipoArchivo" style="width:180px;">
						
						@if($errors->errorsArchivos->has('tipoArchivo'))
							@foreach($errors->errorsArchivos->get('tipoArchivo') as $error)
								<small class="text-danger"><strong>{{$error}}</strong></small>
							@endforeach
						@endif

						<input id="filebox" name="archivo" style="width:550px;max-width:200px"">
						@if($errors->errorsArchivos->has('archivo'))
							@foreach($errors->errorsArchivos->get('archivo') as $error)
								<small class="text-danger"><strong>{{$error}}</strong></small>
							@endforeach
						@endif

						<div class="text-center pb-1">
							<button class="easyui-linkbutton mt-2" style="width:55px">Crear</button> 
						</div>

					</form>
   				
   			</div>
		</div>
	</div>
</div>

