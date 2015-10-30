function FncGuardar()
{
	Fecha_inicio = $("#fecha_inicio").val();
	Fecha_inicio = Fecha_inicio.substring(6,10)+Fecha_inicio.substring(3,5)+Fecha_inicio.substring(0,2); 
	Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();

	if((Fecha_inicio != '') && (Nombre != '') && (Usuario != ''))
	{
		Parametros = "Ingreso_Asignacion_Turnos=1"+"&Fecha_inicio="+Fecha_inicio+"&Nombre="+Nombre+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_asignar_turnos.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}

}