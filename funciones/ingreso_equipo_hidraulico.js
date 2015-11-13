function FncGuardar()
{
    Nombre = $("#nombre").val();
    Cod_reciente = $("#cod_reciente").val();
    Marca = $("#marca").val();
    Color = $("#color").val();
    Empleado = $("#empleado").val();
    Cantidad = $("#cantidad").val();

	if(Nombre != '' && Cod_reciente != '' && Marca != '' && Color != '' && Empleado != ''  && Cantidad != '')
	{
		Parametros = "Ingreso_Equipo_Hidraulico=1"+"&Nombre="+Nombre+"&Cod_reciente="+Cod_reciente+"&Marca="+Marca+"&Color="+Color+"&Empleado="+Empleado+"&Cantidad="+Cantidad;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_equipo_hidraulico.php', Parametros, Div, false);
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

function FncMofificar(noEquipo,nombre,codigoReciente,marca,color,cantidad,asignadoA)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE USUARIOS";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
   
    $("#Inputactualizacion").val(noEquipo);
    $("#nombre").val(nombre);
    $("#cod_reciente").val(codigoReciente);
    $("#marca").val(marca);
    $("#color").val(color);
    $("#empleado").val(asignadoA);
    $("#empleado").select2();
    $("#cantidad").val(cantidad);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_Hidraulico").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_equipo_hidraulico');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Nombre = $("#nombre").val();
    Cod_reciente = $("#cod_reciente").val();
    Marca = $("#marca").val();
    Color = $("#color").val();
    Empleado = $("#empleado").val();
    Cantidad = $("#cantidad").val();

    if(Nombre != '' && Cod_reciente != '' && Marca != '' && Color != '' && Empleado != ''  && Cantidad != '')
    {
        Parametros = "Modificar=1"+"&ID="+ID+"&Nombre="+Nombre+"&Cod_reciente="+Cod_reciente+"&Marca="+Marca+"&Color="+Color+"&Empleado="+Empleado+"&Cantidad="+Cantidad;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_equipo_hidraulico.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}