function FncGuardar()
{
	Codigo = $("#codigo").val();
	Actividad = $("#actividad").val();
	Estado = $("#estado").val();

	if((Codigo != '') && (Actividad != '') && (Estado != ''))
	{
		Parametros = "Ingreso_Actividades=1"+"&Codigo="+Codigo+"&Actividad="+Actividad+"&Estado="+Estado;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_actividades.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}

}