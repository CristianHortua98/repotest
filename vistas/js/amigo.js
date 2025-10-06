$("#nuevaSeleccionParticipante").change(function(){

    var participante = $(this).val();

    var datos = new FormData();
	datos.append("participante", participante);

	 $.ajax({
	    url:"ajax/amigo.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
            
            console.log(respuesta);

			$("#idPersonaParticipante").val(respuesta["id_persona"]);
            $("#grupoFamiliarParticipante").val(respuesta["grupo_familiar"]);
			$("#repetirIdPersona").val(respuesta["repetir_id_persona"])

	    }

	})

})