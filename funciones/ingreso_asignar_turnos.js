function FncGuardar()
{
	Fecha_inicio = $("#fecha_inicio").val();
	Fecha_inicio = Fecha_inicio.substring(6,10)+Fecha_inicio.substring(3,5)+Fecha_inicio.substring(0,2); 
	Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();

	if((Fecha_inicio != '') && (Nombre != '') && (Usuario != ''))
	{
		Parametros = "Ingreso_Asignacion_Turnos=1"+"&Fecha_inicio="+Fecha_inicio+"&Nombre="+Nombre+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_asignar_turnos.php', Parametros, Div, false);
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

function FncModificar(idasigTurno,Fechas,idTurno,idEmpleado)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE ASIGNACION DE TURNOS";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $('#Inputactualizacion').val(idasigTurno);
    $("#fecha_inicio").val(Fechas);
	$("#nombre").val(idTurno);
    $("#nombre").select2();
	$("#usuario").val(idEmpleado);
    $("#usuario").select2();

    $("#divBtnGuardar").hide();
    $("#tabla_AsignacionTurnos").hide();
    $("#divBtnModificar").show();
    
}

function FncCancelar()
{
    cargar_pagina('ingreso_asignar_turnos');   
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Fecha_inicio = $("#fecha_inicio").val();
    Fecha_inicio = Fecha_inicio.substring(6,10)+Fecha_inicio.substring(3,5)+Fecha_inicio.substring(0,2); 
    Nombre = $("#nombre").val();
    Usuario = $("#usuario").val();

    if((Fecha_inicio != ''))
    {
        Parametros = "Modificar=1"+"&ID="+ID+"&Fecha_inicio="+Fecha_inicio+"&Nombre="+Nombre+"&Usuario="+Usuario;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_asignar_turnos.php', Parametros, Div, false);
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
        Parametros = "BuscarAsignacionTurnos=1"+"&Fechab1="+Fechab1+"&Fechab2="+Fechab2+"&Turno="+Turno+"&Usuariob="+Usuariob;

        $.post("tablas.php", Parametros, function( data ){
            $( "#mostrar" ).html( data );
        })
    }
    else
    {
        alert("Seleccione las Fechas para filtrar");
    }
    
}