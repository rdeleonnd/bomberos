function FncGuardar()
{
    Categoria = $("#categoria").val();
    Subcategorias = $("#subcategorias").val();
	Incidente = $("#incidente").val();

	if(Incidente != '')
	{
		Parametros = "Ingreso_Incidente=1"+"&Subcategorias="+Subcategorias+"&Incidente="+Incidente+"&Categoria="+Categoria;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_categorias_incidentes.php', Parametros, Div, false);
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

function FncComboCategoria(ID,div)
{
    div=document.getElementById(div);
    strParam="subcategorias=1"+"&ID="+ID;
    div_dinamico("POST",'combos.php',strParam,div,false);
}

function FncMofificar(idIncidente,idservicio,idCausa, descIncidente)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE IINCIDENTES";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $("#Inputactualizacion").val(idIncidente);
    $("#categoria").val(idservicio);
    $("#categoria").select2();
    FncComboCategoria(idservicio,'divsubcategoria');
    $("#subcategorias").val(idCausa);
    $("#subcategorias").select2();
    $("#incidente").val(descIncidente);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_incidente").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_categorias_incidentes');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Categoria = $("#categoria").val();
    Subcategorias = $("#subcategorias").val();
    Incidente = $("#incidente").val();

    if(Incidente != '')
    {
        Parametros = "Modificar=1"+"&ID="+ID+"&Subcategorias="+Subcategorias+"&Incidente="+Incidente+"&Categoria="+Categoria;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_categorias_incidentes.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}