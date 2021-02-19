$(document).ready(function () {      
	$('.opciones').hide();
	$('.image-link').magnificPopup({
  		type: 'image',
	});

	$('.video-link').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		fixedContentPos: true
	});

////////////////////////////////////////Busquedas de usuarios (administrador)  ////////////////////////////////////////

$('#ssBusquedaUsuario').searchbox({
	searcher:function busquedaSB() {
		document.forms['busqueda'].submit();
	},
	prompt:'Teclee nombre o usuario',
	width:'215',
});

///////////////////////////////////////////Busquedas pacientes y archivos ///////////////////////////////////////////////////////////////

$('#ssBusqueda').searchbox({
	searcher:function busquedaSB() {
		document.forms['busqueda'].submit();
	},
	prompt:'Teclee nombre o registro',
	width:'215',
});

$('#ssBusquedaFoto').linkbutton({
	disabled:true,
	iconCls:'icon-search',
	width:'70',
	onClick:function busquedaSB() {
		document.forms['busqueda'].submit();
	},
});

/*$('#ssBusquedaFoto').searchbox({
	disabled:true,
	searcher:function busquedaSB() {
		document.forms['busqueda'].submit();
	},
});*/

$('#ccPatologiaBusqueda').combobox({
	disabled:true,
	editable:false,
	label:'Clínica:',
	labelPosition:'top',
	labelAlign:'left',
	width:'215',
	panelHeight:'auto',
	valueField:'label',
    textField:'value',
	data:[
		{label:'Mano',value:'Mano'},
		//{label:'Nervio periférico',value:'Nervio periférico'},
		{label:'Quemados',value:'Quemados'},
		{label:'Estética',value:'Estética'},
		{label:'Craneofacial',value:'Craneofacial'},
		{label:'Reconstructiva y microcirugía',value:'Reconstructiva y microcirugía'},
		//{label:'Cáncer',value:'Cáncer'},
		{label:'Otro',value:'Otro'}
	]
});

$('#ccDiagnosticoBusqueda').combobox({
	disabled:true,
	editable:false,
	label:'Diagnostico:',
	labelPosition:'top',
	labelAlign:'left',
	width:'215',
	panelHeight:'auto',
	valueField:'label',
    textField:'value',
	panelHeight:180,
	data:[
		{label:'Abdominoplastia', value:'Abdominoplastia'},
		{label:'Aloinjerto', value:'Aloinjerto'},
		{label:'Aplasia', value:'Aplasia'},
		{label:'Asimetría facial', value:'Asimetría facial'},
		{label:'Autoinjerto', value:'Autoinjerto'},
		{label:'Bichatectomia', value:'Bichatectomia'},
		{label:'Biopsia', value:'Biopsia'},
		{label:'Blefaroplastia', value:'Blefaroplastia'},
		{label:'Botox', value:'Botox'},
		{label:'Camptodactilia', value:'Camptodactilia'},
		{label:'Capsulotomía', value:'Capsulotomía'},
		{label:'Cicatriz retráctil', value:'Cicatriz retráctil'},
		{label:'Cicatriz retráctil', value:'Cicatriz retráctil'},
		{label:'Clavo Kirschner', value:'Clavo Kirschner'},
		{label:'Colgajo de peroné', value:'Colgajo de peroné'},
		{label:'Colgajo inguinal', value:'Colgajo inguinal'},
		{label:'Colgajo pectoral', value:'Colgajo pectoral'},
		{label:'Colgajo radial', value:'Colgajo radial'},
		{label:'Comisurotomia', value:'Comisurotomia'},
		{label:'Compresión nerviosa', value:'Compresión nerviosa'},
		{label:'Contractura de Dupuytren', value:'Contractura de Dupuytren'},
		{label:'Craneosinostosis', value:'Craneosinostosis'},
		{label:'DIEP', value:'DIEP'},
		{label:'Deformación en cuello de cisne', value:'Deformación en cuello de cisne'},
		{label:'Dorsal ancho', value:'Dorsal ancho'},
		{label:'Duplicación', value:'Duplicación'},
		{label:'Eléctricas', value:'Eléctricas'},
		{label:'Enfermedad de Boutonniere', value:'Enfermedad de Boutonniere'},
		{label:'Epidermolisis bullosa', value:'Epidermolisis bullosa'},
		{label:'Escaldadura', value:'Escaldadura'},
		{label:'Expansor mamario', value:'Expansor mamario'},
		{label:'Expansor tisular', value:'Expansor tisular'},
		{label:'Fijación externa', value:'Fijación externa'},
		{label:'Fisuras faciales', value:'Fisuras faciales'},
		{label:'Fractura de cúbito', value:'Fractura de cúbito'},
		{label:'Fractura de radio', value:'Fractura de radio'},
		{label:'Fractura de órbita', value:'Fractura de órbita'},
		{label:'Fractura falange distral', value:'Fractura falange distral'},
		{label:'Fractura falange proximal', value:'Fractura falange proximal'},
		{label:'Fractura huesos del carpo', value:'Fractura huesos del carpo'},
		{label:'Fractura mandibular', value:'Fractura mandibular'},
		{label:'Fractura metacarpo', value:'Fractura metacarpo'},
		{label:'Fractura metatarsiano', value:'Fractura metatarsiano'},
		{label:'Fractura nasal', value:'Fractura nasal'},
		{label:'Fractura seno etmoidal', value:'Fractura seno etmoidal'},
		{label:'Fractura seno frontal', value:'Fractura seno frontal'},
		{label:'Fractura seno maxilar', value:'Fractura seno maxilar'},
		{label:'Fractura senos paranasales', value:'Fractura senos paranasales'},
		{label:'Fuego directo', value:'Fuego directo'},
		{label:'Hilos tensores', value:'Hilos tensores'},
		{label:'Hipertelorismo', value:'Hipertelorismo'},
		{label:'Hipotelorismo', value:'Hipotelorismo'},
		{label:'Implante mamario', value:'Implante mamario'},
		{label:'Injerto nervioso', value:'Injerto nervioso'},
		{label:'Injerto tendinoso', value:'Injerto tendinoso'},
		{label:'Injerto vascular', value:'Injerto vascular'},
		{label:'Labio hendido', value:'Labio hendido'},
		{label:'Labio y paladar hendido', value:'Labio y paladar hendido'},
		{label:'Lesión de plexo braquial', value:'Lesión de plexo braquial'},
		{label:'Lesión lecho ungueal', value:'Lesión lecho ungueal'},
		{label:'Lesión nerviosa', value:'Lesión nerviosa'},
		{label:'Lesión tendones extensores', value:'Lesión tendones extensores'},
		{label:'Lesión tendones flexores', value:'Lesión tendones flexores'},
		{label:'Liberación de cicatriz', value:'Liberación de cicatriz'},
		{label:'Lipoinfiltración', value:'Lipoinfiltración'},
		{label:'Liposuccion', value:'Liposuccion'},
		{label:'Luxación ', value:'Luxación '},
		{label:'Luxación de huesos del carpo', value:'Luxación de huesos del carpo'},
		{label:'Malformaciones congénitas', value:'Malformaciones congénitas'},
		{label:'Mallet finger (dedo en martillo)', value:'Mallet finger (dedo en martillo)'},
		{label:'Microtia', value:'Microtia'},
		{label:'Mordedura de perro', value:'Mordedura de perro'},
		{label:'Mordedura humana', value:'Mordedura humana'},
		{label:'Otoplastia', value:'Otoplastia'},
		{label:'Paladar hendido', value:'Paladar hendido'},
		{label:'Polidactilia', value:'Polidactilia'},
		{label:'Por fricción', value:'Por fricción'},
		{label:'Por frío', value:'Por frío'},
		{label:'Primer tiempo de Hunter', value:'Primer tiempo de Hunter'},
		{label:'Prognatismo', value:'Prognatismo'},
		{label:'Propeller', value:'Propeller'},
		{label:'Quemadura primer grado', value:'Quemadura primer grado'},
		{label:'Quemadura segundo grado profundo', value:'Quemadura segundo grado profundo'},
		{label:'Quemadura segundo grado superficial', value:'Quemadura segundo grado superficial'},
		{label:'Quemadura tercer grado', value:'Quemadura tercer grado'},
		{label:'Quiste sinovial', value:'Quiste sinovial'},
		{label:'Química', value:'Química'},
		{label:'Reducción mamaria', value:'Reducción mamaria'},
		{label:'Rellenos faciales', value:'Rellenos faciales'},
		{label:'Retrognatia', value:'Retrognatia'},
		{label:'Rinoplastia', value:'Rinoplastia'},
		{label:'Ritidectomia cervical', value:'Ritidectomia cervical'},
		{label:'Ritidectomia facial', value:'Ritidectomia facial'},
		{label:'Ritidectomia frontal', value:'Ritidectomia frontal'},
		{label:'Scalp', value:'Scalp'},
		{label:'Segundo tiempo de Hunter', value:'Segundo tiempo de Hunter'},
		{label:'Sindactilia', value:'Sindactilia'},
		{label:'Solar', value:'Solar'},
		{label:'Síndrome del túnel del carpo', value:'Síndrome del túnel del carpo'},
		{label:'Tendinitis', value:'Tendinitis'},
		{label:'Tenosinovitis de Quervain', value:'Tenosinovitis de Quervain'},
		{label:'Traumatismo en huesos faciales', value:'Traumatismo en huesos faciales'},
		{label:'Trigger finger (dedo en resorte)', value:'Trigger finger (dedo en resorte)'},
		{label:'Tumor de tejidos blandos', value:'Tumor de tejidos blandos'},
		{label:'Xenoinjerto', value:'Xenoinjerto'},
		{label:'Otro',value:'Otro'}
	]
});


$('#ccRegionBusqueda').combobox({
	disabled:true,
	editable:false,
	label:'Región:',
	labelPosition:'top',
	labelAlign:'left',
	width:'215',
	panelHeight:'auto',
	valueField:'label',
  	textField:'value',
	data:[
		{label:'Craneofacial',value:'Craneofacial'},
		{label:'Extremidad superior',value:'Extremidad superior'},
		{label:'Extremidad inferior',value:'Extremidad inferior'},
		{label:'Tórax',value:'Tórax'},
		{label:'Abdomen',value:'Abdomen'}
	]
});


$('#ccPeriodoBusqueda').combobox({
	disabled:true,
	editable:false,
	label:'Periodo:',
	labelPosition:'top',
	labelAlign:'left',
	panelHeight:'auto',
	width:'215',
	valueField:'label',
  	textField:'value',
	data:[
		{label:'Preoperatorio',value:'Preoperatorio'},
		{label:'Transoperatorio',value:'Transoperatorio'},
		{label:'Postoperatorio',value:'Postoperatorio'}
	]
});

$('#ccArchivoBusqueda').combobox({
	disabled:true,
	editable:false,
	label:'Tipo de archivo:',
	labelPosition:'top',
	labelAlign:'left',
	width:'215',
	panelHeight:'auto',
	valueField:'label',
  	textField:'value',
	data:[
		{label:'Foto',value:'Foto'},
		{label:'Video',value:'Video'}
	]
});

/*$('#ddFecha').datebox({
	editable:false,
    disabled:true,
    label:'Fecha de subida:',
    labelPosition:'top',
    labelAlign:'left',
    formatter: function myFormatter(date){
    	var y = date.getFullYear();
    	var m = date.getMonth()+1;
    	var d = date.getDate();
    	return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    },
    parser: function myParser(s){
    	if (!s) return new Date();
    	var ss = (s.split('-'));
    	var y = parseInt(ss[0],10);
    	var m = parseInt(ss[1],10);
    	var d = parseInt(ss[2],10);
    	if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
    		return new Date(y,m-1,d);
    	}	
    	else return new Date();
    }

});
*/
$('#bMes').combobox({
	editable:false,
    disabled:true,
    label:'Mes de subida:',
    labelPosition:'top',
    labelAlign:'left',
    width:'215',
    panelHeight:180,
	valueField:'label',
  	textField:'value',
    data:[
	    {label:'Enero', value:'Enero'},
	    {label:'Febrero', value:'Febrero'},
	    {label:'Marzo', value:'Marzo'},
	    {label:'Abril', value:'Abril'},
	    {label:'Mayo', value:'Mayo'},
	    {label:'Junio', value:'Junio'},
	    {label:'Julio', value:'Julio'},
	    {label:'Agosto', value:'Agosto'},
	    {label:'Septiembre', value:'Septiembre'},
	    {label:'Octubre', value:'Octubre'},
	    {label:'Noviembre', value:'Noviembre'},
	    {label:'Diciembre', value:'Diciembre'},
    ]
});

////////////////////////////////////////Crear archivos //////////////////////////////////////////////////////////
$('.ccPatologia').combobox({
	disabled:false,
	editable:false,
	label:'Clínica:',
	width:230,
	labelPosition:'top',
	labelAlign:'left',
	panelHeight:'auto',
	valueField:'label',
  	textField:'value',
	data:[
		{label:'Mano',value:'Mano'},
		{label:'Quemados',value:'Quemados'},
		{label:'Estética',value:'Estética'},
		{label:'Craneofacial',value:'Craneofacial'},
		{label:'Reconstructiva y microcirugía',value:'Reconstructiva y microcirugía'},
		{label:'Otro',value:'Otro'}
	],
	onSelect: function(record){
  		dataDiagnostico(record.value);
  	},
  	onClick: function(record){
  		dataOtro(record.value);
  	}
});

$('.txPatologiaOtro').textbox({
	label:'Clinica (Otro):',
	labelPosition:'top',
	labelAlign:'left',
	width: 255,
});

$('#divClinicaOtro').hide();

$('#clinicaOtroNo').click(function(){
	$('#divClinicaOtro').hide();
	$('#divDiagOtro').hide();

	$('#divClinica').show();
	$('#divDiag').show();

	$('.ccPatologia').combobox({value:''});

});

$('#diagOtroNo').click(function(){
	$('#divDiagOtro').hide();
	$('#divDiag').show();

	$('.ccDiagnostico').combobox({value:''});

});

$('.ccDiagnostico').combobox({
	disabled:false,
	editable:false,
	label:'Diagnostico:',
	panelHeight:130,
	labelPosition:'top',
	labelAlign:'left',
	width: 255,
	valueField:'label',
    textField:'value',  	
    onClick: function(record){
  		dataOtroDiag(record.value);
  	}
});

$('.txDiagnosticoOtro').textbox({
	label:'Diagnostico (Otro):',
	labelPosition:'top',
	labelAlign:'left',
	width: 255,
});

$('#divDiagOtro').hide();

$('.ccRegion').combobox({
	disabled:false,
	editable:false,
	label:'Región:',
	labelPosition:'top',
	labelAlign:'left',
	panelHeight:'auto',
	valueField:'label',
  	textField:'value',
	data:[
		{label:'Craneofacial',value:'Craneofacial'},
		{label:'Extremidad superior',value:'Extremidad superior'},
		{label:'Extremidad inferior',value:'Extremidad inferior'},
		{label:'Tórax',value:'Tórax'},
		{label:'Abdomen',value:'Abdomen'}
	]
});


$('.ccPeriodo').combobox({
	disabled:false,
	editable:false,
	label:'Periodo:',
	labelPosition:'top',
	labelAlign:'left',
	panelHeight:'auto',
	valueField:'label',
  	textField:'value',
	data:[
		{label:'Preoperatorio',value:'Preoperatorio'},
		{label:'Transoperatorio',value:'Transoperatorio'},
		{label:'Postoperatorio',value:'Postoperatorio'}
	]
});

$('.ccArchivo').combobox({
	disabled:false,
	editable:false,
	label:'Tipo de archivo:',
	labelPosition:'top',
	labelAlign:'left',
	panelHeight:'auto',
	valueField:'label',
  	textField:'value',
	data:[
		{label:'Foto',value:'Foto'},
		{label:'Video',value:'Video'}
	]
});

$('#filebox').filebox({
	label:'Archivo:',
	labelPosition:'top',
	labelAlign:'left',
    buttonText:'Elegir archivo',
    buttonAlign:'right'
});

/////////////////////////////           Campos del login     ////////////////////////////////
$('#tbUsuario').textbox({
	prompt:'Ingrese email o nombre de usuario',
    iconCls:'icon-man',
    iconAlign:'left'
})


$('#tbPassword').textbox({
	prompt:'Contraseña',
	iconCls:'icon-lock',
	iconAlign:'left'
})

}); 


/******************************** Alert de informacion (crear, actualizar, borrar) **********************************/

window.setTimeout(function() {
    $(".alert").delay(3000).fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);


/************************************************************************************************************************/

function alternarBusqueda() {
	var etiquetaValue = document.getElementById('aBusqueda').innerHTML;
	if (etiquetaValue === "Busqueda por archivo") {
		document.getElementById('aBusqueda').innerHTML = "Busqueda por nombre o registro";
		$('#ssBusqueda').searchbox({disabled:true});

		$('#ccPatologiaBusqueda').combobox({disabled:false});
		$('#ccDiagnosticoBusqueda').combobox({disabled:false});
		$('#ccRegionBusqueda').combobox({disabled:false});
		$('#ccPeriodoBusqueda').combobox({disabled:false});
		$('#ccArchivoBusqueda').combobox({disabled:false});
		$('#bMes').combobox({disabled:false});
		$('#ddFecha').datebox({disabled:false});
		$('#ssBusquedaFoto').linkbutton({disabled:false});

		etiquetaValue = document.getElementById('aBusqueda').innerHTML;
	}
	else if (etiquetaValue === "Busqueda por nombre o registro") {
		document.getElementById('aBusqueda').innerHTML = "Busqueda por archivo";
		$('#ccPatologiaBusqueda').combobox({disabled:true});
		$('#ccDiagnosticoBusqueda').combobox({disabled:true});
		$('#ccRegionBusqueda').combobox({disabled:true});
		$('#ccPeriodoBusqueda').combobox({disabled:true});
		$('#ccArchivoBusqueda').combobox({disabled:true});
		$('#bMes').combobox({disabled:true});
		$('#ddFecha').datebox({disabled:true});
		$('#ssBusquedaFoto').linkbutton({disabled:true});

		$('#ssBusqueda').searchbox({disabled:false});

		etiquetaValue = document.getElementById('aBusqueda').innerHTML;
	}
	
}

/*************************************************************************************************************************/
function openSideOpciones(){
  $('.opciones').show();
  var over = document.getElementsByClassName('overlays');
  var side = document.getElementById('opcUser');

  //console.log(over[0].classList[0]);
  //console.log(over[0].style.display);

  if (over[0].style.display === 'block') {

    side.style.display = 'none';
    over[0].style.display = 'none';

  }
  else {

    side.style.display = 'block';
    over[0].style.display = 'block';

  }
}

function closeSideOpciones(){
  $('.opciones').hide();
  var overlay = document.getElementsByClassName('overlays');
  var sidebar = document.getElementById('opcUser');

    sidebar.style.display = 'none';
    overlay[0].style.display = 'none';
}
/********************************************/
function openSideBusqueda(){
  var over = document.getElementsByClassName('overlays');
  var side = document.getElementById('sideBusqueda');

  //console.log(over[0].classList[0]);
  //console.log(over[0].style.display);

  if (over[0].style.display === 'block') {

    side.style.display = 'none';
    over[0].style.display = 'none';

  }
  else {

    side.style.display = 'block';
    over[0].style.display = 'block';

  }
}

function closeSideBusqueda(){
  var overlay = document.getElementsByClassName('overlays');
  var sidebar = document.getElementById('sideBusqueda');

    sidebar.style.display = 'none';
    overlay[0].style.display = 'none';
}
/************************************************************************************************************************/
function openSideInfo(){
  var over = document.getElementsByClassName('overlays');
  var side = document.getElementsByClassName('sidebar');

  if (over[0].style.display === 'block') {

    side[0].style.display = 'none';
    over[0].style.display = 'none';

  }
  else {

    side[0].style.display = 'block';
    over[0].style.display = 'block';

  }
}

function closeSideInfo(){
  var overlay = document.getElementsByClassName('overlays');
  var sidebar = document.getElementsByClassName('sidebar');

    sidebar[0].style.display = 'none';
    overlay[0].style.display = 'none';
}