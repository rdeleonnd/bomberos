function FncGuardarRango()
{
	Rango = $("#rango").val();

	if(Rango != '')
	{
		Parametros = "Ingreso_Rangos=1"+"&Rango="+Rango;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_rangos_estados.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}

function FncGuardarEstado()
{
	Estado = $("#estado").val();
	
	if(Estado != '')
	{
		Parametros = "Ingreso_Estados=1"+"&Estado="+Estado;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_rangos_estados.php', Parametros, Div, false);
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

function FncMofificarRango(id, rango)
{
    $("#rango").val(rango);
    $("#Inputactualizacion").val(id);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_rango").hide();
}

function FncMofificarEstado(id, estado)
{
    $("#estado").val(estado);
    $("#Inputactualizacion2").val(id);

    $("#divBtnGuardar2").hide();
    $("#divBtnModificar2").show();
    $("#tabla_estado").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_rangos_estados');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Rango = $("#rango").val();

    if(Rango != '')
    {
        Parametros = "Modificar_Rangos=1"+"&ID="+ID+"&Rango="+Rango;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_rangos_estados.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    } 
}

function FncModificacion2()
{
    ID = $("#Inputactualizacion2").val();
    Estado = $("#estado").val();
    
    if(Estado != '')
    {
        Parametros = "Modificar_Estados=1"+"&ID="+ID+"&Estado="+Estado;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_rangos_estados.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}