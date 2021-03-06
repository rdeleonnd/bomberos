function FncGuardar()
{
	Codigo = $("#codigo").val();
	Nombre = $("#nombre").val();
	Apellido = $("#apellido").val();
	Direccion = $("#direccion").val();
	Nacimiento = $("#nacimiento").val();
    Nacimiento = Nacimiento.substring(6,10)+Nacimiento.substring(3,5)+Nacimiento.substring(0,2); 
	Sexo = $("#sexo").val();
	Estado_civil = $("#estado_civil").val();
	Telefono = $("#telefono").val();
	Estado_sueldo = $("#estado_sueldo").val();
	Sueldo = $("#sueldo").val();
    Ingreso = $("#ingreso").val();
    Ingreso = Ingreso.substring(6,10)+Ingreso.substring(3,5)+Ingreso.substring(0,2); 
    Rango = $("#rango").val();    
	Estado = $("#estado").val();

	if((Codigo != '') && (Nombre != '') && (Apellido != '') && (Direccion != '') && (Nacimiento != '') && (Sexo != '') && (Estado_civil != '') && (Telefono != '') && (Estado_sueldo != '') && (Ingreso != '') && (Sueldo != '') && (Rango != '') && (Estado != ''))
	{ 
		Parametros= "Ingreso_Personal=1"+"&codigo="+Codigo+"&nombre="+Nombre+"&apellido="+Apellido+"&direccion="+Direccion+"&nacimiento="+Nacimiento+"&sexo="+Sexo
					+"&estado_civil="+Estado_civil+"&telefono="+Telefono+"&estado_sueldo="+Estado_sueldo+"&sueldo="+Sueldo+"&ingreso="+Ingreso+"&rango="+Rango+"&estado="+Estado;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_personal.php', Parametros, Div, false);
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

function FncMofificar(idEmpleado,CodEmpleado,nombres,apellidos,direccion,Fecha_nacimiento,sexo,edoCivil,telefono,idRango,fechaIngreso,salario,idEstado)
{
    document.getElementById("Encabezado_Panel").innerHTML = "MODIFICACION DE PERSONAL";
    //$("#empleado option:selected").prop("selected",false);
   // $("#empleado option[value=" + idPersonal + "]").prop("selected",true);
   
    $("#Inputactualizacion").val(idEmpleado);
    $("#codigo").val(CodEmpleado);
    $("#nombre").val(nombres);
    $("#apellido").val(apellidos);
    $("#direccion").val(direccion);
    $("#nacimiento").val(Fecha_nacimiento);
    $("#sexo").val(sexo);
    $("#estado_civil").val(edoCivil);
    $("#telefono").val(telefono);
    $("#estado_sueldo").val();
    $("#sueldo").val(salario);
    $("#ingreso").val(fechaIngreso);
    $("#rango").val(idRango);    
    $("#estado").val(idEstado);

    $("#divBtnGuardar").hide();
    $("#divBtnModificar").show();
    $("#tabla_personal").hide();
}

function FncCancelar()
{
    cargar_pagina('ingreso_personal');
}
 
function FncModificacion()
{
    ID = $("#Inputactualizacion").val();
    Codigo = $("#codigo").val();
    Nombre = $("#nombre").val();
    Apellido = $("#apellido").val();
    Direccion = $("#direccion").val();
    Nacimiento = $("#nacimiento").val();
    Nacimiento = Nacimiento.substring(6,10)+Nacimiento.substring(3,5)+Nacimiento.substring(0,2); 
    Sexo = $("#sexo").val();
    Estado_civil = $("#estado_civil").val();
    Telefono = $("#telefono").val();
    Estado_sueldo = $("#estado_sueldo").val();
    Sueldo = $("#sueldo").val();
    Ingreso = $("#ingreso").val();
    Ingreso = Ingreso.substring(6,10)+Ingreso.substring(3,5)+Ingreso.substring(0,2); 
    Rango = $("#rango").val();    
    Estado = $("#estado").val();

    if((Codigo != '') && (Nombre != '') && (Apellido != '') && (Direccion != '') && (Nacimiento != '') && (Sexo != '') && (Estado_civil != '') && (Telefono != '') && (Estado_sueldo != '') && (Ingreso != '') && (Sueldo != '') && (Rango != '') && (Estado != ''))
    { 
        Parametros= "Modificar=1"+"&ID="+ID+"&codigo="+Codigo+"&nombre="+Nombre+"&apellido="+Apellido+"&direccion="+Direccion+"&nacimiento="+Nacimiento+"&sexo="+Sexo
                    +"&estado_civil="+Estado_civil+"&telefono="+Telefono+"&estado_sueldo="+Estado_sueldo+"&sueldo="+Sueldo+"&ingreso="+Ingreso+"&rango="+Rango+"&estado="+Estado;
        Div=document.getElementById("principal");
        div_dinamico("POST", 'ingreso_personal.php', Parametros, Div, false);
    }
    else
    {
        alert("Ingrese todos los campos");
    }
}