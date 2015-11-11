function FncGuardar()
{
	Turno = $("#turno").val();
	Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();

	if((Turno != '') && (Nombre != '') && (Usuario != ''))
	{
		Parametros = "Ingreso_Asignar_Actividades=1"+"&Turno="+Turno+"&Nombre="+Nombre+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_asignar_actividades.php', Parametros, Div, false);
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

function FncModificar(idAsistenciaSalida,Fechas,id_Turno,idEmpleado,observaciones)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE SALIDA ASISTENCIA";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $('#Inputactualizacion').val(idAsistenciaSalida);
    $("#fecha_inicio").val(Fechas);
	$("#nombre").val(id_Turno);
	$("#nombre").select2();
	$("#usuario").val(idEmpleado);
	$("#usuario").select2();
	$("#observaciones").val(observaciones);

    $("#divBtnGuardar").hide();
    $("#tabla_AsignacionTareas").hide();
    $("#divBtnModificar").show();
    
}

function FncCancelar()
{
    cargar_pagina('ingreso_salida_asistencia');   
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();
	Observaciones = $("#observaciones").val();

	if(Observaciones != '')
	{
		Parametros = "Modificar=1"+"&ID="+ID+"&Nombre="+Nombre+"&Usuario="+Usuario+"&Observaciones="+Observaciones;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_salida_asistencia.php', Parametros, Div, false);
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
    Turno = $("#nombreb").val();
    Usuariob = $("#usuariob").val();

    if ((Fechab1 != '') && (Fechab2 != ''))
    {
        Parametros = "BuscarAsignacionTareas=1"+"&Fechab1="+Fechab1+"&Fechab2="+Fechab2+"&Turno="+Turno+"&Usuariob="+Usuariob;

        $.post("tablas.php", Parametros, function( data ){
            $( "#mostrar" ).html( data );
        })
    }
    else
    {
        alert("Seleccione las Fechas para filtrar");
    }
    
}