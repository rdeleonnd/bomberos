function FncGuardar()
{
	Codigo = $("#codigo").val();
	Nombre = $("#nombre").val();
	Apellido = $("#apellido").val();
	Direccion = $("#direccion").val();
	Nacimiento = $("#nacimiento").val();
	Sexo = $("#sexo").val();
	Estado_civil = $("#estado_civil").val();
	Telefono = $("#telefono").val();
	Estado_sueldo = $("#estado_sueldo").val();
	Sueldo = $("#sueldo").val();
	Estado = $("#estado").val();

	if((Codigo != '') && (Nombre != '') && (Apellido != '') && (Direccion != '') && (Nacimiento != '') && (Sexo != '') && (Estado_civil != '') && (Telefono != '') && (Estado_sueldo != '') && (Sueldo != '') && (Estado != ''))
	{ 
		Parametros= "Ingreso_Personal=1"+"&codigo="+Codigo+"&nombre="+Nombre+"&apellido="+Apellido+"&direccion="+Direccion+"&nacimiento="+Nacimiento+"&sexo="+Sexo
					+"&estado_civil="+Estado_civil+"&telefono="+Telefono+"&estado_sueldo="+Estado_sueldo+"&sueldo="+Sueldo+"&Estado="+Estado;
		Div=document.getElementById("principal");
		div_dinamico("POST", 'ingreso_personal.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
	

}