/*function mostrarVentana(btn, ruta) {
	$('#winElArch').window('open');
	//console.log(ruta, btn.id);
	$.get(ruta, function(res){
		console.log(res);
		$('#nomArch').html(res.nombre_foto);
		$('#idDl').val(res.id);		
	});
}

function eliminar(form, ruta) {
	var id = form.id.value;
	var ruta = ruta.replace('archivo/id', 'archivo/'+id);

	//console.log(ruta);
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': form._token.value
		}
	});

	$.ajax({
		url:ruta,
		type: 'DELETE',
		dataType: 'json',
		success: function(){
			$('#winElArch').window('close');
			//location.reload();
			$.when(recargar()).then(setTimeout("location.reload()", 1000));
			//setTimeout("recargar()", 1000);

		},
	});

}*/