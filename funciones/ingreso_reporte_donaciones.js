function FncGuardar()
{
	Recibo = $("#recibo").val();
	Nombre = $("#nombre").val();
	Lugar = $("#lugar").val();
	Fecha = $("#fecha").val();
	Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
	Ingreso_por = $("#ingreso_por").val();
	Motivo = $("#motivo").val();
	Usuario = $("#usuario").val();
	
	if ((Recibo != '') && (Nombre != '') && (Lugar != '') && (Fecha != '') && (Ingreso_por != '') && (Motivo != ''))
	{
		Parametros = "Ingreso_Reporte_Donaciones=1"+"&Recibo="+Recibo+"&Nombre="+Nombre+"&Lugar="+Lugar+"&Fecha="+Fecha+"&Ingreso_por="+Ingreso_por+"&Motivo="+Motivo+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reporte_donaciones.php', Parametros, Div, false);
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

function FncModificar(noRecibo,recibo,nombreDonador,direccion,fecha,cantidad,motivo,recibe)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE DONACIONES";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $("#recibo").val(recibo);
    $("#nombre").val(nombreDonador);
    $("#lugar").val(direccion);
    $("#fecha").val(fecha);
    $("#ingreso_por").val(cantidad);
    $("#motivo").val(motivo);
    $("#usuario").val(recibe);
    $('#usuario').select2();
    $('#Inputactualizacion').val(noRecibo);

    $("#divBtnGuardar").hide();
    $("#tabla_donaciones").hide();
    $("#divBtnModificar").show();
    
}

function FncCancelar()
{
    cargar_pagina('ingreso_reporte_donaciones');   
}

function FncModificacion()
{
	ID = $("#Inputactualizacion").val();
    Recibo = $("#recibo").val();
	Nombre = $("#nombre").val();
	Lugar = $("#lugar").val();
	Fecha = $("#fecha").val();
	Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
	Ingreso_por = $("#ingreso_por").val();
	Motivo = $("#motivo").val();
	Usuario = $("#usuario").val();
	
	if ((Recibo != '') && (Nombre != '') && (Lugar != '') && (Fecha != '') && (Ingreso_por != '') && (Motivo != ''))
	{
		Parametros = "Modificar=1"+"&ID="+ID+"&Recibo="+Recibo+"&Nombre="+Nombre+"&Lugar="+Lugar+"&Fecha="+Fecha+"&Ingreso_por="+Ingreso_por+"&Motivo="+Motivo+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reporte_donaciones.php', Parametros, Div, false);
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
    Recibob = $("#recibob").val();
    Usuariob = $("#usuariob").val();

    if ((Fechab1 != '') && (Fechab2 != ''))
    {
        Parametros = "BuscarDonaciones=1"+"&Fechab1="+Fechab1+"&Fechab2="+Fechab2+"&Recibob="+Recibob+"&Usuariob="+Usuariob;

        $.post("tablas.php", Parametros, function( data ){
            $( "#mostrar" ).html( data );
        })
    }
    else
    {
        alert("Seleccione las Fechas para filtrar");
    }
    
}