function FncGuardar()
{
	Recibo = $("#recibo").val();
	Direccion_traslado = $("#direccion_traslado").val();
	Nombre_paciente = $("#nombre_paciente").val();
	Direccion_paciente = $("#direccion_paciente").val();
	Edad = $("#edad").val();
	Rango_edad = $("#rango_edad").val();
	Sexo = $("#sexo").val();
	Traslado_a = $("#traslado_a").val();
	Aviso = $("#aviso").val();
	Telefono = $("#telefono").val();
	Telefonista = $("#telefonista").val();
	Unidad = $("#unidad").val();
	Hora_salida = $("#hora_salida").val();
	Hora_entrada = $("#hora_entrada").val();
	Piloto = $("#piloto").val();
	Fecha = $("#fecha").val();
	Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
	Kilometraje_salida = $("#kilometraje_salida").val();
	Kilometraje_entrada = $("#kilometraje_entrada").val();
	Bombero_reporte = $("#bombero_reporte").val();
	Bombero_asistente = $("#bombero_asistente").val();
	Observaciones = $("#observaciones").val();
	Kilometros_recorridos = $("#kilometros_recorridos").val();
	Categoria = $("#categoria").val();
	/*Subcategorias = $("#subcategorias option:selected").html();
	Incidentes = $("#incidentes option:selected").html();
	Categoria = Categoria + " " + Subcategorias + " " + Incidentes;*/

	if((Recibo != '') && (direccion_traslado != '') && (Nombre_paciente != '') && (Direccion_paciente != '') && (Edad != '') && (Rango_edad != '') && (Sexo != '') 
		&& (Traslado_a != '') && (Aviso != '') && (Telefono != '') && (Telefonista != '') && (Unidad != '') && (Hora_salida != '') && (Hora_entrada != '')
		&& (Piloto != '') && (Fecha != '') && (Kilometraje_salida != '') && (Kilometraje_entrada != '') && (Bombero_reporte != '') && (Bombero_asistente != '')
		&& (Observaciones != '') && (Kilometros_recorridos != '') && (Categoria != ''))
	{
		Parametros = "Ingreso_Reporte_Servicio=1"+"&Recibo="+Recibo+"&Direccion_traslado="+Direccion_traslado+"&Nombre_paciente="+Nombre_paciente
						+"&Direccion_paciente="+Direccion_paciente+"&Edad="+Edad+"&Rango_edad="+Rango_edad+"&Sexo="+Sexo+"&Traslado_a="+Traslado_a
						+"&Aviso="+Aviso+"&Telefono="+Telefono+"&Telefonista="+Telefonista+"&Unidad="+Unidad+"&Hora_salida="+Hora_salida+"&Hora_entrada="+Hora_entrada
						+"&Piloto="+Piloto+"&Fecha="+Fecha+"&Kilometraje_salida="+Kilometraje_salida+"&Kilometraje_entrada="+Kilometraje_entrada
						+"&Bombero_reporte="+Bombero_reporte+"&Bombero_asistente="+Bombero_asistente+"&Observaciones="+Observaciones+"&Kilometros_recorridos="
						+Kilometros_recorridos+"&Categoria="+Categoria;

		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reporte_servicio.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}

function FncComboCategoria(ID,div)
{
    div=document.getElementById(div);
    strParam="subcategorias=1"+"&ID="+ID;
    div_dinamico("POST",'combos.php',strParam,div,false);
}

function FncComboIncidente(ID,div)
{
    div=document.getElementById(div);
    strParam="incidente=1"+"&ID="+ID;
    div_dinamico("POST",'combos.php',strParam,div,false);
}

function FncTabla(tabla)
{
    var oTable=$("#"+tabla).dataTable({
                    "dom": 'T<"clear">lfrtip',
                    tableTools: {
                      "sSwfPath": "data_tables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                      "aButtons": [
                        {
                            "sExtends": "xls",
                            "sButtonText": "Exportar EXCEL",
                            "oSelectorOpts": {
                                page: 'current'
                            }
                        }
                      ]
                    },
                    "bPaginate": false,
                    //"bFilter": false,
                    //"bInfo": false,
                    //"bSort": false,
                    "scrollY": 400,
                    "scrollX": true,
                    "bScrollCollapse": true,
                    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero ",
                            "sLast":     "Último",
                            "sNext":     "Siguiente ",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }

                });
    //new $.fn.dataTable.FixedHeader( oTable );
}

function FncModificar(idReporte, noReporte, direccionTraslado, paciente, direccionPaciente, edad, rangoedad, sexo, lugar_asistencia, aviso, Telefono, telefonista, unid, horaSalida, horaEntrada, piloto, Fecha, kmSalida, kmEntrada, bomberoReporte, asistentes, observaciones, kmRecorridos, idIncidente)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE REPORTES DE SERVICIO";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $('#Inputactualizacion').val(idReporte);
    $("#recibo").val(noReporte);
	$("#direccion_traslado").val(direccionTraslado);
	$("#nombre_paciente").val(paciente);
	$("#direccion_paciente").val(direccionPaciente);
	$("#edad").val(edad);
	$("#rango_edad").val(rangoedad);
	$("#sexo").val(sexo);
	$("#traslado_a").val(lugar_asistencia);
	$("#aviso").val(aviso);
	$("#telefono").val(Telefono);
	$("#telefonista").val(telefonista);
	$("#unidad").val(unid);
	$("#hora_salida").val(horaSalida);
	$("#hora_entrada").val(horaEntrada);
	$("#piloto").val(piloto);
	$("#fecha").val(Fecha);
	$("#kilometraje_salida").val(kmSalida);
	$("#kilometraje_entrada").val(kmEntrada);
	$("#bombero_reporte").val(bomberoReporte);
	$("#bombero_asistente").val(asistentes);
	$("#observaciones").val(observaciones);
	$("#kilometros_recorridos").val(kmRecorridos);
	$("#categoria").val(idIncidente);

	$('#telefonista').select2();
    $('#bombero_reporte').select2();
	$('#unidad').select2();
	$('#piloto').select2();
	$('#categoria').select2();

    $("#divBtnGuardar").hide();
    $("#tabla_Servicios").hide();
    $("#divBtnModificar").show();
    
}

function FncCancelar()
{
    cargar_pagina('ingreso_reporte_servicio');   
}

function FncModificacion()
{
	ID = $("#Inputactualizacion").val();
    Recibo = $("#recibo").val();
	Direccion_traslado = $("#direccion_traslado").val();
	Nombre_paciente = $("#nombre_paciente").val();
	Direccion_paciente = $("#direccion_paciente").val();
	Edad = $("#edad").val();
	Rango_edad = $("#rango_edad").val();
	Sexo = $("#sexo").val();
	Traslado_a = $("#traslado_a").val();
	Aviso = $("#aviso").val();
	Telefono = $("#telefono").val();
	Telefonista = $("#telefonista").val();
	Unidad = $("#unidad").val();
	Hora_salida = $("#hora_salida").val();
	Hora_entrada = $("#hora_entrada").val();
	Piloto = $("#piloto").val();
	Fecha = $("#fecha").val();
	Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
	Kilometraje_salida = $("#kilometraje_salida").val();
	Kilometraje_entrada = $("#kilometraje_entrada").val();
	Bombero_reporte = $("#bombero_reporte").val();
	Bombero_asistente = $("#bombero_asistente").val();
	Observaciones = $("#observaciones").val();
	Kilometros_recorridos = $("#kilometros_recorridos").val();
	Categoria = $("#categoria").val();
	
	if((Recibo != '') && (direccion_traslado != '') && (Nombre_paciente != '') && (Direccion_paciente != '') && (Edad != '') && (Rango_edad != '') && (Sexo != '') 
		&& (Traslado_a != '') && (Aviso != '') && (Telefono != '') && (Telefonista != '') && (Unidad != '') && (Hora_salida != '') && (Hora_entrada != '')
		&& (Piloto != '') && (Fecha != '') && (Kilometraje_salida != '') && (Kilometraje_entrada != '') && (Bombero_reporte != '') && (Bombero_asistente != '')
		&& (Observaciones != '') && (Kilometros_recorridos != '') && (Categoria != ''))
	{
		Parametros = "Modificar=1"+"&ID="+ID+"&Recibo="+Recibo+"&Direccion_traslado="+Direccion_traslado+"&Nombre_paciente="+Nombre_paciente
						+"&Direccion_paciente="+Direccion_paciente+"&Edad="+Edad+"&Rango_edad="+Rango_edad+"&Sexo="+Sexo+"&Traslado_a="+Traslado_a
						+"&Aviso="+Aviso+"&Telefono="+Telefono+"&Telefonista="+Telefonista+"&Unidad="+Unidad+"&Hora_salida="+Hora_salida+"&Hora_entrada="+Hora_entrada
						+"&Piloto="+Piloto+"&Fecha="+Fecha+"&Kilometraje_salida="+Kilometraje_salida+"&Kilometraje_entrada="+Kilometraje_entrada
						+"&Bombero_reporte="+Bombero_reporte+"&Bombero_asistente="+Bombero_asistente+"&Observaciones="+Observaciones+"&Kilometros_recorridos="
						+Kilometros_recorridos+"&Categoria="+Categoria;

		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reporte_servicio.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}

function FncBuscar()
{
    Fechab1 = $("#fechab1").val();
    Fechab1 = Fechab1.substring(6,10)+Fechab1.substring(3,5)+Fechab1.substring(0,2);
    Fechab2 = $("#fechab2").val();
    Fechab2 = Fechab2.substring(6,10)+Fechab2.substring(3,5)+Fechab2.substring(0,2);
    Categoria = $("#categoriab").val();
    Usuariob = $("#usuariob").val();
    Unidad = $("#unidadb").val();

    if ((Fechab1 != '') && (Fechab2 != ''))
    {
        Parametros = "BuscarServicios=1"+"&Fechab1="+Fechab1+"&Fechab2="+Fechab2+"&Categoria="+Categoria+"&Usuariob="+Usuariob+"&Unidad="+Unidad;

        $.post("tablas.php", Parametros, function( data ){
            $( "#mostrar" ).html( data );
        })
    }
    else
    {
        alert("Seleccione las Fechas para filtrar");
    }
    
}
