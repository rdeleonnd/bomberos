function FncGuardar()
{
	Recibo = $("#recibo").val();
	Nombre = $("#nombre").val();
	Lugar = $("#lugar").val();
	Fecha = $("#fecha").val();
	Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
	Ingreso_por = $("#ingreso_por").val();
	Motivo = $("#motivo").val();
	Usuario = $("#usuario").val();
	
	if ((Recibo != '') && (Nombre != '') && (Lugar != '') && (Fecha != '') && (Ingreso_por != '') && (Motivo != ''))
	{
		Parametros = "Ingreso_Reporte_Donaciones=1"+"&Recibo="+Recibo+"&Nombre="+Nombre+"&Lugar="+Lugar+"&Fecha="+Fecha+"&Ingreso_por="+Ingreso_por+"&Motivo="+Motivo+"&Usuario="+Usuario;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reporte_donaciones.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}