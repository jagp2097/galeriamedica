
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function dataDiagnostico(clinica) {

	switch(clinica){
		case 'Mano':
		$('#divDiag').show();
		$('#divDiagOtro').hide();
		$('.ccDiagnostico').combobox({
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

		/*case 'Nervio periférico':
		$('#divDiag').show();
		$('#divDiagOtro').hide();
		$('.ccDiagnostico').combobox({
			disabled:false,
			data:[
				{label:'4', value:'4'},
				{label:'5', value:'5'},
				{label:'6', value:'6'},
			],
		});
		break;*/
		
		case 'Quemados':
		$('#divDiag').show();
		$('#divDiagOtro').hide();
		$('.ccDiagnostico').combobox({
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
		$('#divDiag').show();
		$('#divDiagOtro').hide();
		$('.ccDiagnostico').combobox({
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
		
		case 'Reconstructiva y microcirugía':
		$('#divDiag').show();
		$('#divDiagOtro').hide();
		$('.ccDiagnostico').combobox({
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
		
		case 'Craneofacial':
		$('#divDiag').show();
		$('#divDiagOtro').hide();
		$('.ccDiagnostico').combobox({
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
		
		/*case 'Cáncer':
		$('#divDiag').show();
		$('#divDiagOtro').hide();
		$('.ccDiagnostico').combobox({
			disabled:false,
			data:[
					{label:'19', value:'19'},
					{label:'20', value:'20'},
					{label:'21', value:'21'},
				]
		});														
		break;*/
/*
		case 'Otro':
		$('#divDiag').hide();
		$('#divDiagOtro').show();

		$('#divClinica').hide();
		$('#divClinicaOtro').show();

		break;
*/
		/*default:
		$('#divDiagOtro').hide();
		break;*/
	
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function dataOtro(clinica) {

	switch(clinica){

		case 'Otro':
			$('#divDiag').hide();
			$('#divDiagOtro').show();
			$('#diagOtroNo').hide();

			$('#divClinica').hide();
			$('#divClinicaOtro').show();

			break;
		
		default:
			$('#divDiagOtro').hide();
			break;

	}
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function dataOtroDiag(clinica) {

	switch(clinica){

		case 'Otro':			
			$('#divDiag').hide();
			$('#divDiagOtro').show();

			$('#diagOtroNo').show();

			//$('#divClinica').hide();
			//$('#divClinicaOtro').show();

			break;
		
		/*default:
			$('#divDiagOtro').hide();
			break;
*/
	}
	
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
