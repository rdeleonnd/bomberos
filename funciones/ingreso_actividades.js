function FncGuardar()
{
	Actividad = $("#actividad").val();
	Estado = $("#estado").val();

	if((Actividad != '') && (Estado != ''))
	{
		Parametros = "Ingreso_Actividades=1"+"&Actividad="+Actividad+"&Estado="+Estado;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_actividades.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}

}