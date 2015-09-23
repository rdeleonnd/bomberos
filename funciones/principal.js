$('a').click(function(){
	Pagina = $(this).attr('href');
	alert(Pagina);
	$("#principal").load(Pagina);

	return false;
});

function cargar_pagina(pagina)
{
	Div=document.getElementById("principal");
	if(pagina=='ingreso_reporte_servicio')
	{
		Parametros = "ingreso_reporte_servicio=1";
		div_dinamico("POST", 'ingreso_reporte_servicio.php', Parametros, Div, false);
	}
	else if(pagina=='ingreso_reporte_donaciones')
	{
		Parametros = "ingreso_reporte_donaciones=1";
		div_dinamico("POST", 'ingreso_reporte_donaciones.php', Parametros, Div, false);
	}
	else if(pagina=='ingreso_incidentes')
	{
		Parametros = "ingreso_incidentes=1";
		div_dinamico("POST", 'ingreso_incidentes.php', Parametros, Div, false);
	}
	else if(pagina=='ingreso_categorias_incidentes')
	{
		Parametros = "ingreso_categorias_incidentes=1";
		div_dinamico("POST", 'ingreso_categorias_incidentes.php', Parametros, Div, false);
	}
	else if(pagina=='ingreso_personal')
	{
		Parametros = "ingreso_personal=1";
		div_dinamico("POST", 'ingreso_personal.php', Parametros, Div, false);
	}
}