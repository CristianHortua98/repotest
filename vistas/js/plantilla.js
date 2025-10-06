$(document).ready(function(){

	$('.select2').select2({

		theme: 'bootstrap4',

	});
    
});

/*=============================================
Data Table
=============================================*/

$(document).ready( function () {
    $('#tablas').DataTable({

		"language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
	
		}

	});
});

$(document).ready(function() {
    $('#tablaReporte').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    } );
} );

/*
$(document).ready( function () {
$(".tablaReporte").DataTable({

    info: true,
    paging: true,
    ordering: true,
    searching: true,
    pageLength: -1,
    fixedHeader: true,
    scrollY: "25vh",
    scrollX: "100%",
    language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },
    lengthMenu: [
        [10, 20, 50, 100, 500, -1], [10, 20, 50, 100, 500, 'Todos']
    ],
    dom:'Bfrtip',
    buttons:[{extend:'pageLength', text: "Cantidad Registros"},
           {extend:'copy', text:'Copiar'},
           {extend:'excel', text:'Excel'},
           {extend:'csv', text:'Csv'}]
  
  
});

});*/


$(".btnEnviarFormulario").click(function(){

	var correoElectronico = document.getElementById('nuevoCorreoElectronico').value;

	var correoValida = false;

	if(correoElectronico == "" || correoElectronico == null){

		swal({

			type: "error",
			title: "¡Debe digitar correo electronico!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}else{

		if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correoElectronico)){


		}else{

			swal({

				type: "error",
				title: "¡El correo electronico posea una estructura incorrecta!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false

			})

		}

	}

	var correoElectronicoConfirmar = document.getElementById('nuevoCorreoElectronicoConfirmar').value;

	if(correoElectronicoConfirmar == ""){

		swal({

			type: "error",
			title: "¡Debe digitar el correo electronico para validar que son iguales!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}else{

		if(correoElectronico != correoElectronicoConfirmar){

			swal({

				type: "error",
				title: "¡Los correos electronicos digitados son diferentes, por favor validar!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false
	
			})

		}

		if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correoElectronicoConfirmar)){

			correoValida = true;

		}else{

			swal({

				type: "error",
				title: "¡El correo electronico posea una estructura incorrecta!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false

			})

		}

	}


	var nombres = document.getElementById('nuevoNombres').value;

	if(nombres == ""){

		swal({

			type: "error",
			title: "¡Debe digitar sus Nombres completos!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}else{

		var regex = new RegExp("^[a-zA-Z ]+$");

		if(!regex.test(nombres)){

			swal({

				type: "error",
				title: "¡Los nombres contienen una estructura incorrecta!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false
	
			})

		}

	}


	var apellidos = document.getElementById('nuevoApellidos').value;

	if(apellidos == ""){

		swal({

			type: "error",
			title: "¡Debe digitar sus Apellidos completos!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}else{

		var regex = new RegExp("^[a-zA-Z ]+$");

		if(!regex.test(apellidos)){

			swal({

				type: "error",
				title: "¡Los apellidos contienen una estructura incorrecta!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false
	
			})

		}

	}


	var cedula = document.getElementById('nuevaCedula').value;

	if(cedula == ""){

		swal({

			type: "error",
			title: "¡Debe digitar su numero de cedula completo, sin puntos solo el numero!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}


	var celular = document.getElementById('nuevoCelular').value;

	if(celular == ""){

		swal({

			type: "error",
			title: "¡Debe digitar su numero de celular completo, sin puntos solo el numero!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}

	var otroCelular = document.getElementById('nuevoContactoOtro').value;

	if(otroCelular == ""){

		otroCelular = "NA"

	}


	var EstadoCivil = $('input:radio[name=nuevoEstadoCivil]:checked').val();
	var EstadoCivilOtros = document.getElementById('nuevoEstadoCivilOtro').value;


	if(EstadoCivil == "" || EstadoCivil == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Estado Civil!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}else if(EstadoCivil == "Otros"){

		if(EstadoCivilOtros == ""){

			swal({

				type: "error",
				title: "¡Debe digitar el estado civil!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false
	
			})

		}

	} 

	
	if(EstadoCivil != "Otros"){

		EstadoCivilOtros = "";

	}


	var PersonasACargo = $('input:radio[name=nuevoPersonasACargo]:checked').val();

	if(PersonasACargo == "" || PersonasACargo == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Personas a cargo!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}


	var FechaNacimiento = document.getElementById('nuevaFechaNacimiento').value;

	if(FechaNacimiento == ""){

		swal({

			type: "error",
			title: "¡Debe seleccionar su fecha de nacimiento!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}



	var NivelEducativo = $('input:radio[name=nuevoNivelEducativo]:checked').val();
	var NivelEducativolOtros = document.getElementById('nuevoNivelEducativoOtro').value;


	if(NivelEducativo == "" || NivelEducativo == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Nivel Educativo!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}else if(NivelEducativo == "Otros"){

		if(NivelEducativolOtros == ""){

			swal({

				type: "error",
				title: "¡Debe digitar el Nivel Educativo!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false
	
			})

		}

	} 

	
	if(NivelEducativo != "Otros"){

		NivelEducativolOtros = "";

	}


	var Estrato = $('input:radio[name=nuevoEstrato]:checked').val();

	if(Estrato == "" || Estrato == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Estrato!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}


	var Ocupacion = $('input:radio[name=nuevoOcupacion]:checked').val();

	if(Ocupacion == "" || Ocupacion == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Ocupación!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}


	var MedioTransporte = $('input:radio[name=nuevoMedioTransporte]:checked').val();

	if(MedioTransporte == "" || MedioTransporte == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Medio de transporte!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}



	var cadenaTiposProteccion = "";

	$('#nuevoTipoProteccion:checked').each(
		function() {

			cadenaTiposProteccion = cadenaTiposProteccion.concat($(this).val() + " ");
			
		}
	);

	if(cadenaTiposProteccion == "") {

		swal({

			type: "error",
			title: "¡Debe seleccionar que tipos de protección tiene!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}


	var TieneMascota = $('input:radio[name=nuevoTieneMascota]:checked').val();

	if(TieneMascota == "" || TieneMascota == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Si tiene mascota!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}


	var TipoVivienda = $('input:radio[name=nuevoTipoVivienda]:checked').val();

	if(TipoVivienda == "" || TipoVivienda == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar tipo de vivienda!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}



	var ManejaTarjeta = $('input:radio[name=nuevoManejaTarjeta]:checked').val();

	if(ManejaTarjeta == "" || ManejaTarjeta == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar si maneja tarjeta de crédito!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}



	var IngresoMensual = $('input:radio[name=nuevoIngresoMensual]:checked').val();

	if(IngresoMensual == "" || IngresoMensual == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar su ingreso mensual!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}

	

	var CodigoRefiere = document.getElementById('nuevoCodigoRefiere').value;


	var PoliticaDatos = $('input:radio[name=nuevoAceptaPoliticas]:checked').val();

	if(PoliticaDatos == "" || PoliticaDatos == null) {
		
		swal({

			type: "error",
			title: "¡Debe seleccionar Politica y tratamiento de datos!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			allowOutsideClick: false,
			allowEscapeKey : false

		})

	}

	if(correoElectronico != "" && nombres != "" && apellidos != "" && cedula != "" && celular != "" && EstadoCivil != "" && PersonasACargo != "" && FechaNacimiento != "" && NivelEducativo != "" && Estrato != "" && Ocupacion != "" && MedioTransporte != "" && cadenaTiposProteccion != "" && TieneMascota != "" && TipoVivienda != "" && ManejaTarjeta != "" && IngresoMensual != "" && PoliticaDatos != ""){

		if(correoElectronico == correoElectronicoConfirmar){

			var datos = new FormData();
			datos.append("correoElectronico", correoElectronico);
			datos.append("nombres", nombres);
			datos.append("apellidos", apellidos);
			datos.append("cedula", cedula);
			datos.append("celular", celular);
			datos.append("otroCelular", otroCelular);
			datos.append("EstadoCivil", EstadoCivil);
			datos.append("EstadoCivilOtros", EstadoCivilOtros);
			datos.append("PersonasACargo", PersonasACargo);
			datos.append("FechaNacimiento", FechaNacimiento);
			datos.append("NivelEducativo", NivelEducativo);
			datos.append("NivelEducativolOtros", NivelEducativolOtros);
			datos.append("Estrato", Estrato);
			datos.append("Ocupacion", Ocupacion);
			datos.append("MedioTransporte", MedioTransporte);
			datos.append("cadenaTiposProteccion", cadenaTiposProteccion);
			datos.append("TieneMascota", TieneMascota);
			datos.append("TipoVivienda", TipoVivienda);
			datos.append("ManejaTarjeta", ManejaTarjeta);
			datos.append("IngresoMensual", IngresoMensual);
			datos.append("CodigoRefiere", CodigoRefiere);
			datos.append("PoliticaDatos", PoliticaDatos);


			$.ajax({

				url:"ajax/formulario.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){

					console.log(respuesta);
					
					if(respuesta == "ok"){

						swal({

							type: "success",
							title: "¡El Formulario se envio correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							allowOutsideClick: false,
							allowEscapeKey : false

						}).then(function(result){

							if(result.value){

								window.location = "formulario-referidos";
							
							}

						});

					}
					
				}
		
			});

		}else{

			swal({

				type: "error",
				title: "¡Los correos electronicos digitados son diferentes, por favor validar!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				allowOutsideClick: false,
				allowEscapeKey : false
	
			})			

		}

	}
})