function FncGuardar()
{
    Fecha = $("#fecha").val();
    Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
	Unidad = $("#unidad").val();
    Costo = $("#costo").val();
    Comprobante = $("#comprobante").val();
    Descripcion = $("#descripcion").val();

	if(Fecha != '' && Costo != '' && Comprobante != '' && Descripcion != '')
	{
		Parametros = "Ingreso_Reparaciones=1"+"&Fecha="+Fecha+"&Unidad="+Unidad+"&Costo="+Costo+"&Comprobante="+Comprobante+"&Descripcion="+Descripcion;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reparaciones.php', Parametros, Div, false);
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

function FncModificar(idReparacion,idUnidad,Fechas,costo,comprobante,descripcion)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE REPARACIONES";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $('#Inputactualizacion').val(idReparacion);
    $("#fecha").val(Fechas);
    $("#unidad").val(idUnidad);
    $("#costo").val(costo);
    $("#comprobante").val(comprobante);
    $("#descripcion").val(descripcion);

    $("#divBtnGuardar").hide();
    $("#tabla_Reparacion").hide();
    $("#divBtnModificar").show();
    
}

function FncCancelar()
{
    cargar_pagina('ingreso_reparaciones');   
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Fecha = $("#fecha").val();
    Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
    Unidad = $("#unidad").val();
    Costo = $("#costo").val();
    Comprobante = $("#comprobante").val();
    Descripcion = $("#descripcion").val();

    if(Fecha != '' && Costo != '' && Comprobante != '' && Descripcion != '')
    {
        Parametros = "Modificar=1"+"&ID="+ID+"&Fecha="+Fecha+"&Unidad="+Unidad+"&Costo="+Costo+"&Comprobante="+Comprobante+"&Descripcion="+Descripcion;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_reparaciones.php', Parametros, Div, false);
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
    Usuariob = $("#unidadb").val();

    if ((Fechab1 != '') && (Fechab2 != ''))
    {
        Parametros = "BuscarReparaciones=1"+"&Fechab1="+Fechab1+"&Fechab2="+Fechab2+"&Recibob="+Recibob+"&Usuariob="+Usuariob;

        $.post("tablas.php", Parametros, function( data ){
            $( "#mostrar" ).html( data );
        })
    }
    else
    {
        alert("Seleccione las Fechas para filtrar");
    }
    
}