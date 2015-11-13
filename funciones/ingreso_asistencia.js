function FncGuardar()
{
	Fecha_inicio = $("#fecha_inicio").val();
	Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();
	Observaciones = $("#observaciones").val();

	if((Fecha_inicio != '') && (Nombre != '') && (Usuario != '') && (Observaciones != ''))
	{
		Parametros = "Ingreso_Asistencia=1"+"&Fecha_inicio="+Fecha_inicio+"&Nombre="+Nombre+"&Usuario="+Usuario+"&Observaciones="+Observaciones;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_asistencia.php', Parametros, Div, false);
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

function FncModificar(idAsistenciaEntrada,Fechas,id_Turno,codEmpleado,observaciones)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE ENTRADA ASISTENCIA";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $('#Inputactualizacion').val(idAsistenciaEntrada);
    $("#fecha_inicio").val(Fechas);
	$("#nombre").val(id_Turno);
	$("#nombre").select2();
	$("#usuario").val(codEmpleado);
	$("#usuario").select2();
	$("#observaciones").val(observaciones);

    $("#divBtnGuardar").hide();
    $("#tabla_IngresoPersonal").hide();
    $("#divBtnModificar").show();
    
}

function FncCancelar()
{
    cargar_pagina('ingreso_asistencia');   
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
		div_dinamico("POST", 'ingreso_asistencia.php', Parametros, Div, false);
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
        Parametros = "BuscarIngresoPersonal=1"+"&Fechab1="+Fechab1+"&Fechab2="+Fechab2+"&Turno="+Turno+"&Usuariob="+Usuariob;

        $.post("tablas.php", Parametros, function( data ){
            $( "#mostrar" ).html( data );
        })
    }
    else
    {
        alert("Seleccione las Fechas para filtrar");
    }
    
}