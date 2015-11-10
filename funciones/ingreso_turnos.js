function FncGuardar()
{
	Nombre = $("#nombre").val();
	Hora_inicio = $("#hora_inicio").val();
	Hora_fin = $("#hora_fin").val();

	if((Nombre != '') && (Hora_inicio != '')&& (Hora_fin != ''))
	{
		Parametros = "Ingreso_Turnos=1"+"&Nombre="+Nombre+"&Hora_inicio="+Hora_inicio+"&Hora_fin="+Hora_fin;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_turnos.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");

	}
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
                    "scrollY": 200,
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

function FncMofificar(id_turno,nombreTurno,horaInicio,horaFin)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE TURNOS";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $("#Inputactualizacion").val(id_turno);
    $("#nombre").val(nombreTurno);
	$("#hora_inicio").val(horaInicio);
	$("#hora_fin").val(horaFin);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_Turnos").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_turnos');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Nombre = $("#nombre").val();
	Hora_inicio = $("#hora_inicio").val();
	Hora_fin = $("#hora_fin").val();

	if((Nombre != '') && (Hora_inicio != '')&& (Hora_fin != ''))
	{
		Parametros = "Modificar=1"+"&ID="+ID+"&Nombre="+Nombre+"&Hora_inicio="+Hora_inicio+"&Hora_fin="+Hora_fin;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_turnos.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");

	}
}