function FncGuardarIncidente()
{
	Incidente = $("#incidente").val();

	if(Incidente != '')
	{
		Parametros = "Ingreso_Categoria=1"+"&Incidente="+Incidente;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_incidentes.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}

function FncGuardarSubCategoria()
{
	Subcategoria = $("#subcategoria").val();
    Categoria = $("#categoria").val();
	
	if(Subcategoria != '')
	{
		Parametros = "Ingreso_SubCategoria=1"+"&Subcategoria="+Subcategoria+"&Categoria="+Categoria;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_incidentes.php', Parametros, Div, false);
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

function FncMofificarCategoria(codServicio, descServicio)
{
    $("#Inputactualizacion").val(codServicio);
    $("#incidente").val(descServicio);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_incidente").hide();
}

function FncMofificarSubCategoria(idCausa, descCausa, codServicio)
{
    $("#Inputactualizacion2").val(idCausa);
    $("#categoria").val(codServicio);
    $("#categoria").select2();
    $("#subcategoria").val(descCausa);
    

    $("#divBtnGuardar2").hide();
    $("#divBtnModificar2").show();
    $("#tabla_subcategoria").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_incidentes');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Incidente = $("#incidente").val();

    if(Incidente != '')
    {
        Parametros = "Modificar_Categoria=1"+"&ID="+ID+"&Incidente="+Incidente;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_incidentes.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    } 
}

function FncModificacion2()
{
    ID = $("#Inputactualizacion2").val();
    Subcategoria = $("#subcategoria").val();
    Categoria = $("#categoria").val();
    
    if(Subcategoria != '')
    {
        Parametros = "Modificar_SubCategoria=1"+"&ID="+ID+"&Subcategoria="+Subcategoria+"&Categoria="+Categoria;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_incidentes.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}