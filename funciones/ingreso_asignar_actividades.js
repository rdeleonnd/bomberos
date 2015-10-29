function FncGuardar()
{
	Turno = $("#turno").val();
	Nombre = $("#nombre").val();
	Usuario = $("#usuario").val();

	if((Turno != '') && (Nombre != '') && (Usuario != ''))
	{
		Parametros = "Ingreso_Asignar_Actividades=1"+"&Turno="+Turno+"&Nombre="+Nombre+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_asignar_actividades.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}

}