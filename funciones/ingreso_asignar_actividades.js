function FncGuardar()
{
	Fecha_inicio = $("#fecha_inicio").val();
	Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();

	if((Fecha_inicio != '') && (Nombre != '') && (Usuario != ''))
	{
		Parametros = "Ingreso_Asignar_Actividades=1"+"&Fecha_inicio="+Fecha_inicio+"&Nombre="+Nombre+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_asignar_actividades.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}

}