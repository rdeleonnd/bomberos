$('a').click(function(){
	Pagina = $(this).attr('href');
	alert(Pagina);
	$("#principal").load(Pagina);

	return false;
});

function Calendario(objeto)
{
    $("#"+objeto).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            dateFormat:"dd-mm-yy",
            numberOfMonths: 1,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute'],
            buttonImageOnly: true, 
            showOn: 'button', 
            buttonImage: 'img/calendario.png',
            buttonText: "Seleccione Fecha"
        });
}

function cargar_pagina(pagina)
{
	Div=document.getElementById("principal");
	if(pagina=='ingreso_reporte_servicio')
	{
		Parametros = "ingreso_reporte_servicio=1";
		div_dinamico("POST", 'ingreso_reporte_servicio.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE REPORTE DE SERVICIO";
	}
	else if(pagina=='ingreso_reporte_donaciones')
	{
		Parametros = "ingreso_reporte_donaciones=1";
		div_dinamico("POST", 'ingreso_reporte_donaciones.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE DONACIONES";
	}
	else if(pagina=='ingreso_incidentes')
	{
		Parametros = "ingreso_incidentes=1";
		div_dinamico("POST", 'ingreso_incidentes.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE INCIDENTES";
	}
	else if(pagina=='ingreso_categorias_incidentes')
	{
		Parametros = "ingreso_categorias_incidentes=1";
		div_dinamico("POST", 'ingreso_categorias_incidentes.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE CATEGORIAS DE INCIDENTES";
	}
	else if(pagina=='ingreso_personal')
	{
		Parametros = "ingreso_personal=1";
		div_dinamico("POST", 'ingreso_personal.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE PERSONAL";
	}
	else if(pagina=='ingreso_turnos')
	{
		Parametros = "ingreso_turnos=1";
		div_dinamico("POST", 'ingreso_turnos.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE TURNOS";
	}
	else if(pagina=='ingreso_asignar_turnos')
	{
		Parametros = "ingreso_asignar_turnos=1";
		div_dinamico("POST", 'ingreso_asignar_turnos.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE ASIGNACION DE TURNOS";
	}
	else if(pagina=='ingreso_asistencia')
	{
		Parametros = "ingreso_asistencia=1";
		div_dinamico("POST", 'ingreso_asistencia.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE ASISTENCIA";
	}
	else if(pagina=='ingreso_salida_asistencia')
	{
		Parametros = "ingreso_salida_asistencia=1";
		div_dinamico("POST", 'ingreso_salida_asistencia.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE SALIDA DE ASISTENCIA";
	}
	else if(pagina=='ingreso_actividades')
	{
		Parametros = "ingreso_actividades=1";
		div_dinamico("POST", 'ingreso_actividades.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE ACTIVIDADES";
	}
	else if(pagina=='ingreso_asignar_actividades')
	{
		Parametros = "ingreso_asignar_actividades=1";
		div_dinamico("POST", 'ingreso_asignar_actividades.php', Parametros, Div, false);
		document.getElementById("Encabezado_Panel").innerHTML = "INGRESO DE ASIGNACION DE ACTIVIDADES";
	}
	
}