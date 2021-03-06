function FncGuardar()
{
	Empleado = $("#empleado").val();
	Nombre = $("#nombre").val();
	Clave = $("#clave").val();
	Estado = $("#estado").val();
	Privilegio = $("#privilegio").val();

	if((Nombre != '') && (Clave != ''))
	{
		Parametros = "Ingreso_Usuarios=1"+"&Empleado="+Empleado+"&Nombre="+Nombre+"&Clave="+Clave+"&Estado="+Estado+"&Privilegio="+Privilegio;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_usuarios.php', Parametros, Div, false);
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

function FncMofificar(idUsuario,idPersonal,nombreUser,clave,idEstado,privilegio)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE USUARIOS";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
    $("#empleado").val(idPersonal);
    $('#empleado').select2();
    $("#nombre").val(nombreUser);
    $("#clave").val(clave);
    $("#estado").val(idEstado);
    $("#privilegio").val(privilegio);
    $("#Inputactualizacion").val(idUsuario);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_usuario").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_usuarios');
}

function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Empleado = $("#empleado").val();
    Nombre = $("#nombre").val();
    Clave = $("#clave").val();
    Estado = $("#estado").val();
    Privilegio = $("#privilegio").val();

    if((Nombre != '') && (Clave != ''))
    {
        Parametros = "Modificar=1"+"&ID="+ID+"&Empleado="+Empleado+"&Nombre="+Nombre+"&Clave="+Clave+"&Estado="+Estado+"&Privilegio="+Privilegio;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_usuarios.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}
