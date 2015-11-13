function FncGuardar()
{
    Nombre = $("#nombre").val();
    Cod_anterior = $("#cod_anterior").val();
    Cod_reciente = $("#cod_reciente").val();
    Empleado = $("#empleado").val();
    Descripcion = $("#descripcion").val();

	if(Nombre != '' && Cod_anterior != '' && Cod_reciente != '' && Descripcion != '')
	{
		Parametros = "Ingreso_Casco_Chaqueton=1"+"&Nombre="+Nombre+"&Cod_anterior="+Cod_anterior+"&Cod_reciente="+Cod_reciente+"&Empleado="+Empleado+"&Descripcion="+Descripcion;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_casco_chaqueton.php', Parametros, Div, false);
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

function FncMofificar(idEquipo,nombre,codAnterior,codReciente,asignadoA,observaciones)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE CASCO Y CHAQUETONES";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
   
    $("#Inputactualizacion").val(idEquipo);
    $("#nombre").val(nombre);
    $("#cod_anterior").val(codAnterior);
    $("#cod_reciente").val(codReciente);
    $("#empleado").val(asignadoA);
    $("#descripcion").val(observaciones);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_Cascos").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_casco_chaqueton');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Nombre = $("#nombre").val();
    Cod_anterior = $("#cod_anterior").val();
    Cod_reciente = $("#cod_reciente").val();
    Empleado = $("#empleado").val();
    Descripcion = $("#descripcion").val();

    if(Nombre != '' && Cod_anterior != '' && Cod_reciente != '' && Descripcion != '')
    {
        Parametros = "Modificar=1"+"&ID="+ID+"&Nombre="+Nombre+"&Cod_anterior="+Cod_anterior+"&Cod_reciente="+Cod_reciente+"&Empleado="+Empleado+"&Descripcion="+Descripcion;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_casco_chaqueton.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}