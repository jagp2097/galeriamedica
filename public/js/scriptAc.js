//Funcion para mostrar en la ventana de editar
function mostrar(id,ruta){
	//$('#winEdArch').window('open');
	document.getElementById('winEdArch').style.display='block'

	$('#clinicaOtroNoEdit').click(function(){
		$('#clinicaOtroEdit').hide();
		
		$('#diagnosticoOtroEdit').hide();

		$('#clinicaEdit').show();
		$('#diagnosticoEdit').show();

		$('#patologia').combobox({value:''});
		$('#diagnostico').combobox({value:''});
		$('#patologiaOtro').textbox('clear');
		$('#diagnosticoOtro').textbox('clear');

	});

	$('#diagOtroNoEdit').click(function(){
		$('#diagnosticoOtroEdit').hide();
		$('#diagnosticoEdit').show();

		$('#patologia').combobox({value:''});
		$('#diagnostico').combobox({value:''});
		$('#patologiaOtro').textbox('clear');
		$('#diagnosticoOtro').textbox('clear');	

	});

	$('#patologia').combobox({
		onSelect: function(record){
	  	dataDiagnosticoEdit(record.value);
	  	},
	  	onClick: function(record){
  		dataOtroEdit(record.value);
  		}
	});

	$('#diagnostico').combobox({
	  	onClick: function(record){
  		dataOtroEditDiag(record.value);
  	}
	});

//Trae la informacion y la inserta al campo correspondiente
	$.get(ruta, function(res) {
		$('#nombreArchivo').textbox({value:res.nombre_foto});
		if (res.patologia.includes("Otro") && res.diagnostico.includes("Otro")) {

			var subPato = res.patologia.substr(5);
			var subDiag = res.diagnostico.substr(5);

			$('#clinicaEdit').hide();
			$('#diagnosticoEdit').hide();

			$('#clinicaOtroEdit').show();
			$('#diagnosticoOtroEdit').show();
			
			$('#diagOtroNoEdit').hide();

			$('#diagnosticoOtro').textbox({value:subDiag});
			$('#patologiaOtro').textbox({value:subPato});
		}
		
		else if (res.diagnostico.includes("Otro")) {
			
			var subPato = res.patologia;
			var subDiag = res.diagnostico.substr(5);

			$('#clinicaOtroEdit').hide();
			$('#diagnosticoEdit').hide();

			$('#diagOtroNoEdit').show();

			$('#clinicaEdit').show();
			$('#diagnosticoOtroEdit').show();

			$('#patologia').combobox({value:subPato});
			$('#diagnosticoOtro').textbox({value:subDiag});

		}

		else {
			$('#clinicaEdit').show();
			$('#diagnosticoEdit').show();

			$('#clinicaOtroEdit').hide();
			$('#diagnosticoOtroEdit').hide();

			$('#patologia').combobox({value:res.patologia});
			$('#diagnostico').combobox({value:res.diagnostico});
		}
	
		$('#region').combobox({value:res.region});
		$('#periodo').combobox({value: res.periodo});
		$('#tipoArchivo').combobox({value:res.tipo_archivo});
		$('#id').val(res.id);
		//console.log($('#id').val());
		//console.log(ruta);
	});

}


function actualizar(form, ruta){
	var id = form.id.value;
	var ruta = ruta.replace('archivo/id', 'archivo/'+id);

	var pat;
	var diag;

	if ($('#patologiaOtro').val() !== '') {
		pat = 'Otro:'.concat($('#patologiaOtro').val());
		diag = 'Otro:'.concat($('#diagnosticoOtro').val());
	}

	else if ($('#diagnosticoOtro').val() !== '' &&  $('#patologia').val() !== null) {
		pat = $('#patologia').val();
		diag = 'Otro:'.concat($('#diagnosticoOtro').val());		
	}

	else {
		pat = $('#patologia').val();
		diag = $('#diagnostico').val();
	}
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': form._token.value
		}
	});

	$.ajax({
		url:ruta,
		type: 'PUT',
		dataType: 'json',
		data:{	
			nombre_foto: $('#nombreArchivo').val(),
			patologia: pat,
			diagnostico: diag,
			region: $('#region').val(),
			periodo: $('#periodo').val(),
			tipo_archivo: $('#tipoArchivo').val(),
		},
		success: function(){
			document.getElementById('winEdArch').style.display='none';
			//$('#winEdArch').window('close');
			//location.reload();
			$.when(recargar()).then(setTimeout("location.reload()", 1000));
			//setTimeout("recargar()", 1000);

		},
		error: function(e){
			console.log(e.responseJSON);
			$.each(e.responseJSON.errors, function(key, value){
				if (key == 'nombre_foto') $('#EnombreArchivo').html(value);
				if (key == 'patologia') $('#Epatologia').html(value);
				if (key == 'diagnostico') $('#Ediagnostico').html(value);
				if (key == 'patologiaOtro') $('#EpatologiaOtro').html(value);
				if (key == 'diagnosticoOtro') $('#EdiagnosticoOtro').html(value);
				if (key == 'region') $('#Eregion').html(value);
				if (key == 'periodo') $('#Eperiodo').html(value);
				if (key == 'tipo_archivo') $('#EtipoArchivo').html(value);
			});
		},
	});

	/*console.log($('#nombreArchivo').val());
	console.log($('#patologia').val());
	console.log($('#patologiaOtro').val());
	console.log($('#diagnostico').val());
	console.log($('#diagnosticoOtro').val());
	console.log($('#region').val())
	console.log($('#periodo').val())
	console.log($('#tipoArchivo').val())*/

}

//Recarga la pagina para que se reflejen los cambios
function recargar(){
	$('#alert').append(
		"<div class='alert alert-info' role='alert'>Información del archivo actualizada con éxito<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
	);
	window.setTimeout(function() {
	    $(".alert").delay(3000).fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove(); 
	    });
	}, 4000);
}

function dataDiagnosticoEdit(clinica) {

	switch(clinica){
		case 'Mano':
		//$('#diagnosticoEdit').show();
		//$('#diagnosticoOtroEdit').hide();
		$('#diagnostico').combobox({
			disabled:false,
			data:[
				{label:'Capsulotomía', value:'Capsulotomía'},
				{label:'Lesión tendones extensores', value:'Lesión tendones extensores'},
				{label:'Lesión tendones flexores', value:'Lesión tendones flexores'},
				{label:'Lesión nerviosa', value:'Lesión nerviosa'},
				{label:'Lesión de plexo braquial', value:'Lesión de plexo braquial'},
				{label:'Fractura metacarpo', value:'Fractura metacarpo'},
				{label:'Fractura metatarsiano', value:'Fractura metatarsiano'},
				{label:'Fractura falange distral', value:'Fractura falange distral'},
				{label:'Fractura falange proximal', value:'Fractura falange proximal'},			
				{label:'Lesión lecho ungueal', value:'Lesión lecho ungueal'},			
				{label:'Fijación externa', value:'Fijación externa'},			
				{label:'Clavo Kirschner', value:'Clavo Kirschner'},			
				{label:'Injerto tendinoso', value:'Injerto tendinoso'},			
				{label:'Injerto vascular', value:'Injerto vascular'},			
				{label:'Injerto nervioso', value:'Injerto nervioso'},
				{label:'Luxación ', value:'Luxación '},	
				{label:'Primer tiempo de Hunter', value:'Primer tiempo de Hunter'},		
				{label:'Segundo tiempo de Hunter', value:'Segundo tiempo de Hunter'},	
				{label:'Epidermolisis bullosa', value:'Epidermolisis bullosa'},		
				{label:'Luxación de huesos del carpo', value:'Luxación de huesos del carpo'},
				{label:'Fractura huesos del carpo', value:'Fractura huesos del carpo'},		
				{label:'Camptodactilia', value:'Camptodactilia'},	
				{label:'Sindactilia', value:'Sindactilia'},		
				{label:'Polidactilia', value:'Polidactilia'},
				{label:'Aplasia', value:'Aplasia'},		
				{label:'Duplicación', value:'Duplicación'},
				{label:'Mordedura de perro', value:'Mordedura de perro'},	
				{label:'Mordedura humana', value:'Mordedura humana'},
				{label:'Síndrome del túnel del carpo', value:'Síndrome del túnel del carpo'},
				{label:'Tenosinovitis de Quervain', value:'Tenosinovitis de Quervain'},
				{label:'Contractura de Dupuytren', value:'Contractura de Dupuytren'},
				{label:'Trigger finger (dedo en resorte)', value:'Trigger finger (dedo en resorte)'},
				{label:'Mallet finger (dedo en martillo)', value:'Mallet finger (dedo en martillo)'},
				{label:'Compresión nerviosa', value:'Compresión nerviosa'},
				{label:'Tumor de tejidos blandos', value:'Tumor de tejidos blandos'},
				{label:'Quiste sinovial', value:'Quiste sinovial'},
				{label:'Cicatriz retráctil', value:'Cicatriz retráctil'},
				{label:'Fractura de radio', value:'Fractura de radio'},
				{label:'Fractura de cúbito', value:'Fractura de cúbito'},
				{label:'Malformaciones congénitas', value:'Malformaciones congénitas'},
				{label:'Deformación en cuello de cisne', value:'Deformación en cuello de cisne'},
				{label:'Enfermedad de Boutonniere', value:'Enfermedad de Boutonniere'},
				{label:'Tendinitis', value:'Tendinitis'},
				{label:'Otro', value:'Otro'},
			]
		});
		break;

		case 'Quemados':
		//$('#diagnosticoEdit').show();
		//$('#diagnosticoOtroEdit').hide();
		$('#diagnostico').combobox({
			disabled:false,
			data:[
				{label:'Quemadura primer grado', value:'Quemadura primer grado'},
				{label:'Quemadura segundo grado superficial', value:'Quemadura segundo grado superficial'},
				{label:'Quemadura segundo grado profundo', value:'Quemadura segundo grado profundo'},
				{label:'Quemadura tercer grado', value:'Quemadura tercer grado'},
				{label:'Fuego directo', value:'Fuego directo'},
				{label:'Escaldadura', value:'Escaldadura'},
				{label:'Eléctricas', value:'Eléctricas'},
				{label:'Por fricción', value:'Por fricción'},
				{label:'Por frío', value:'Por frío'},
				{label:'Solar', value:'Solar'},
				{label:'Química', value:'Química'},
				{label:'Expansor tisular', value:'Expansor tisular'},
				{label:'Cicatriz retráctil', value:'Cicatriz retráctil'},
				{label:'Liberación de cicatriz', value:'Liberación de cicatriz'},
				{label:'Otro', value:'Otro'},
			],
		});
		break;
		
		case 'Estética':
		//$('#diagnosticoEdit').show();
		//$('#diagnosticoOtroEdit').hide();
		$('#diagnostico').combobox({
			disabled:false,
			data:[
				{label:'Ritidectomia facial', value:'Ritidectomia facial'},
				{label:'Ritidectomia cervical', value:'Ritidectomia cervical'},
				{label:'Ritidectomia frontal', value:'Ritidectomia frontal'},
				{label:'Botox', value:'Botox'},
				{label:'Rinoplastia', value:'Rinoplastia'},
				{label:'Bichatectomia', value:'Bichatectomia'},
				{label:'Liposuccion', value:'Liposuccion'},
				{label:'Reducción mamaria', value:'Reducción mamaria'},
				{label:'Implante mamario', value:'Implante mamario'},
				{label:'Comisurotomia', value:'Comisurotomia'},
				{label:'Blefaroplastia', value:'Blefaroplastia'},
				{label:'Otoplastia', value:'Otoplastia'},
				{label:'Rellenos faciales', value:'Rellenos faciales'},
				{label:'Hilos tensores', value:'Hilos tensores'},
				{label:'Abdominoplastia', value:'Abdominoplastia'},
				{label:'Expansor mamario', value:'Expansor mamario'},
				{label:'Lipoinfiltración', value:'Lipoinfiltración'},
				{label:'Biopsia', value:'Biopsia'},
				{label:'Otro', value:'Otro'},
			]
		});
		break;
		
		case 'Craneofacial':
		//$('#diagnosticoEdit').show();
		//$('#diagnosticoOtroEdit').hide();
		$('#diagnostico').combobox({
			disabled:false,
			data:[
				{label:'Labio hendido', value:'Labio hendido'},
				{label:'Paladar hendido', value:'Paladar hendido'},
				{label:'Labio y paladar hendido', value:'Labio y paladar hendido'},
				{label:'Microtia', value:'Microtia'},
				{label:'Craneosinostosis', value:'Craneosinostosis'},
				{label:'Prognatismo', value:'Prognatismo'},
				{label:'Retrognatia', value:'Retrognatia'},
				{label:'Scalp', value:'Scalp'},
				{label:'Fisuras faciales', value:'Fisuras faciales'},
				{label:'Hipertelorismo', value:'Hipertelorismo'},
				{label:'Hipotelorismo', value:'Hipotelorismo'},
				{label:'Traumatismo en huesos faciales', value:'Traumatismo en huesos faciales'},
				{label:'Fractura nasal', value:'Fractura nasal'},
				{label:'Fractura seno maxilar', value:'Fractura seno maxilar'},
				{label:'Fractura senos paranasales', value:'Fractura senos paranasales'},
				{label:'Fractura seno etmoidal', value:'Fractura seno etmoidal'},
				{label:'Fractura seno frontal', value:'Fractura seno frontal'},
				{label:'Fractura de órbita', value:'Fractura de órbita'},
				{label:'Fractura mandibular', value:'Fractura mandibular'},
				{label:'Asimetría facial', value:'Asimetría facial'},
				{label:'Otro', value:'Otro'},
			]
		});
		break;
		
		case 'Reconstructiva y microcirugía':
		//$('#diagnosticoEdit').show();
		//$('#diagnosticoOtroEdit').hide();
		$('#diagnostico').combobox({
			disabled:false,
			data:[
				{label:'Colgajo inguinal', value:'Colgajo inguinal'},
				{label:'Colgajo radial', value:'Colgajo radial'},
				{label:'Colgajo de peroné', value:'Colgajo de peroné'},
				{label:'DIEP', value:'DIEP'},
				{label:'Dorsal ancho', value:'Dorsal ancho'},
				{label:'Propeller', value:'Propeller'},
				{label:'Colgajo pectoral', value:'Colgajo pectoral'},
				{label:'Autoinjerto', value:'Autoinjerto'},
				{label:'Xenoinjerto', value:'Xenoinjerto'},
				{label:'Aloinjerto', value:'Aloinjerto'},
				{label:'Otro', value:'Otro'},
			]
		});
		break;
		
	}
}

function dataOtroEdit(clinica) {

	switch(clinica){

		case 'Otro':
		$('#diagnosticoEdit').hide();
		$('#diagnosticoOtroEdit').show();

		$('#clinicaEdit').hide();
		$('#clinicaOtroEdit').show();

		$('#diagOtroNoEdit').hide();

		break;

		/*default:
		$('#diagnosticoOtroEdit').hide();
		break;*/

	}
	
}

function dataOtroEditDiag(clinica) {

	switch(clinica){

		case 'Otro':			
			$('#diagnosticoEdit').hide();
			$('#diagnosticoOtroEdit').show();

			$('#diagOtroNoEdit').show();

			//$('#divClinica').hide();
			//$('#divClinicaOtro').show();

			break;
		
		/*default:
			$('#divDiagOtro').hide();
			break;
*/
	}
	
}
