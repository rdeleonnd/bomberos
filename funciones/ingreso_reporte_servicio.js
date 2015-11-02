function FncGuardar()
{
	Recibo = $("#recibo").val();
	Direccion_traslado = $("#direccion_traslado").val();
	Nombre_paciente = $("#nombre_paciente").val();
	Direccion_paciente = $("#direccion_paciente").val();
	Edad = $("#edad").val();
	Rango_edad = $("#rango_edad").val();
	Sexo = $("#sexo").val();
	Traslado_a = $("#traslado_a").val();
	Aviso = $("#aviso").val();
	Telefono = $("#telefono").val();
	Telefonista = $("#telefonista").val();
	Unidad = $("#unidad").val();
	Hora_salida = $("#hora_salida").val();
	Hora_entrada = $("#hora_entrada").val();
	Piloto = $("#piloto").val();
	Fecha = $("#fecha").val();
	Fecha = Fecha.substring(6,10)+Fecha.substring(3,5)+Fecha.substring(0,2);
	Kilometraje_salida = $("#kilometraje_salida").val();
	Kilometraje_entrada = $("#kilometraje_entrada").val();
	Bombero_reporte = $("#bombero_reporte").val();
	Bombero_asistente = $("#bombero_asistente").val();
	Observaciones = $("#observaciones").val();
	Kilometros_recorridos = $("#kilometros_recorridos").val();
	Cod = $("#cod").val();

	if((Recibo != '') && (direccion_traslado != '') && (Nombre_paciente != '') && (Direccion_paciente != '') && (Edad != '') && (Rango_edad != '') && (Sexo != '') 
		&& (Traslado_a != '') && (Aviso != '') && (Telefono != '') && (Telefonista != '') && (Unidad != '') && (Hora_salida != '') && (Hora_entrada != '')
		&& (Piloto != '') && (Fecha != '') && (Kilometraje_salida != '') && (Kilometraje_entrada != '') && (Bombero_reporte != '') && (Bombero_asistente != '')
		&& (Observaciones != '') && (Kilometros_recorridos != '') && (Cod != ''))
	{
		Parametros = "Ingreso_Reporte_Servicio=1"+"&Recibo="+Recibo+"&Direccion_traslado="+Direccion_traslado+"&Nombre_paciente="+Nombre_paciente
						+"&Direccion_paciente="+Direccion_paciente+"&Edad="+Edad+"&Rango_edad="+Rango_edad+"&Sexo="+Sexo+"&Traslado_a="+Traslado_a
						+"&Aviso="+Aviso+"&Telefono="+Telefono+"&Telefonista="+Telefonista+"&Unidad="+Unidad+"&Hora_salida="+Hora_salida+"&Hora_entrada="+Hora_entrada
						+"&Piloto="+Piloto+"&Fecha="+Fecha+"&Kilometraje_salida="+Kilometraje_salida+"&Kilometraje_entrada="+Kilometraje_entrada
						+"&Bombero_reporte="+Bombero_reporte+"&Bombero_asistente="+Bombero_asistente+"&Observaciones="+Observaciones+"&Kilometros_recorridos="
						+Kilometros_recorridos+"&Cod="+Cod;

		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_reporte_servicio.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
	


}