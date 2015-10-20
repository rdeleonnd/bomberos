function FncGuardar()
{
	Codigo = $("#codigo").val();
	Nombre = $("#nombre").val();
	Apellido = $("#apellido").val();
	Direccion = $("#direccion").val();
	Nacimiento = $("#nacimiento").val();
	Sexo = $("#sexo").val();
	Estado_civil = $("#estado_civil").val();
	Telefono = $("#telefono").val();
	Estado_sueldo = $("#estado_sueldo").val();
	Sueldo = $("#sueldo").val();
	Estado = $("#estado").val();

	if((Codigo != '') && (Nombre != '') && (Apellido != '') && (Direccion != '') && (Nacimiento != '') && (Sexo != '') && (Estado_civil != '') && (Telefono != '') && (Estado_sueldo != '') && (Sueldo != '') && (Estado != ''))
	{ 
		Parametros= "Ingreso_Personal=1"+"&codigo="+Codigo+"&nombre="+Nombre+"&apellido="+Apellido+"&direccion="+Direccion+"&nacimiento="+Nacimiento+"&sexo="+Sexo
					+"&estado_civil="+Estado_civil+"&telefono="+Telefono+"&estado_sueldo="+Estado_sueldo+"&sueldo="+Sueldo+"&Estado="+Estado;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_personal.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}

function fncDataTablesReport(idTable,columns,col)
{
    var oTable=$("#"+idTable).dataTable({
                    "dom": 'T<"clear">lfrtip',
                    tableTools: {
                      "sSwfPath": "general_repository/data_tables/extras/TableTools/swf/copy_csv_xls_pdf.swf",
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
                    },

                });
    
    new $.fn.dataTable.FixedColumns( oTable, {
        leftColumns: columns,
        rightColumns: col
    } );
    //new $.fn.dataTable.FixedHeader( oTable );
}