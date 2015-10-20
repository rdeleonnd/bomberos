function FncGuardar()
{
	Recibo = $("#recibo").val();
	Nombre = $("#nombre").val();
	Lugar = $("#lugar").val();
	Fecha = $("#fecha").val();
	Ingreso_por = $("#ingreso_por").val();
	
	if ((Recibo != '') && (Nombre != '') && (Lugar != '') && (Fecha != '') && (Ingreso_por != ''))
	{
		Parametros = "Ingreso_Reporte_Donaciones=1"+"&Recibo="+Recibo+"&Nombre="+Nombre+"&Lugar="+Lugar+"&Fecha="+Fecha+"&Ingreso_por="+Ingreso_por;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reporte_donaciones.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}