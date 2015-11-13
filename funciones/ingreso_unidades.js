function FncGuardar()
{
	Codigo = $("#codigo").val();
	Modelo = $("#modelo").val();
	Tipo = $("#tipo").val();
	Ingreso = $("#ingreso").val();
    Ingreso = Ingreso.substring(6,10)+Ingreso.substring(3,5)+Ingreso.substring(0,2); 
	Chasis = $("#chasis").val();

	if((Codigo != '') && (Modelo != '') && (Ingreso != '') && (Chasis != ''))
	{ 
		Parametros= "Ingreso_unidad=1"+"&Codigo="+Codigo+"&Modelo="+Modelo+"&Tipo="+Tipo+"&Ingreso="+Ingreso+"&Chasis="+Chasis;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_unidades.php', Parametros, Div, false);
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

function FncMofificar(idUnidad,unidad_no,modelo,tipo_vehiculo,Fecha_ingreso,no_chasis)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE UNIDADES";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
   
    $("#Inputactualizacion").val(idUnidad);
    $("#codigo").val(unidad_no);
    $("#modelo").val(modelo);
    $("#tipo").val(tipo_vehiculo);
    $("#ingreso").val(Fecha_ingreso);
    $("#chasis").val(no_chasis);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_Unidades").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_unidades');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Codigo = $("#codigo").val();
    Modelo = $("#modelo").val();
    Tipo = $("#tipo").val();
    Ingreso = $("#ingreso").val();
    Ingreso = Ingreso.substring(6,10)+Ingreso.substring(3,5)+Ingreso.substring(0,2); 
    Chasis = $("#chasis").val();

    if((Codigo != '') && (Modelo != '') && (Ingreso != '') && (Chasis != ''))
    { 
        Parametros = "Modificar=1"+"&ID="+ID+"&Codigo="+Codigo+"&Modelo="+Modelo+"&Tipo="+Tipo+"&Ingreso="+Ingreso+"&Chasis="+Chasis;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_unidades.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}