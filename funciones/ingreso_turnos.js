function FncGuardar()
{
	Nombre = $("#nombre").val();
	Fecha_inicio = $("#fecha_inicio").val();
	Fecha_inicio = Fecha_inicio.substring(6,10)+Fecha_inicio.substring(3,5)+Fecha_inicio.substring(0,2); 
	Hora_inicio = $("#hora_inicio").val();
	Fecha_fin = $("#fecha_fin").val();
	Fecha_fin = Fecha_fin.substring(6,10)+Fecha_fin.substring(3,5)+Fecha_fin.substring(0,2); 
	Hora_fin = $("#hora_fin").val();

	if((Nombre != '') && (Fecha_inicio != '') && (Hora_inicio != '') && (Fecha_fin != '') && (Hora_fin != ''))
	{
		Parametros = "Ingreso_Turnos=1"+"&Nombre="+Nombre+"&Fecha_inicio="+Fecha_inicio+"&Hora_inicio="+Hora_inicio+"&Fecha_fin="+Fecha_fin+"&Hora_fin="+Hora_fin;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_turnos.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");

	}
}