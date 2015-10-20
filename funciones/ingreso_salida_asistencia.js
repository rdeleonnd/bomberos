function FncGuardar()
{
	Fecha_inicio = $("#fecha_inicio").val();
	Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();
	Observaciones = $("#observaciones").val();

	if((Fecha_inicio != '') && (Nombre != '') && (Usuario != '') && (Observaciones != ''))
	{
		Parametros = "Ingreso_Salida_Asistencia=1"+"&Fecha_inicio="+Fecha_inicio+"&Nombre="+Nombre+"&Usuario="+Usuario+"&Observaciones="+Observaciones;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_salida_asistencia.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}

}