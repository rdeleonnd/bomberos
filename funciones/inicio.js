function FncIngreso()
{
	Usuario = $("#Usuario").val();
	Clave = $("#Codigo").val();
	
	if((Usuario != '') && (Llave != ''))
	{
		Parametros = "Sesion=1"+"&Usuario="+Usuario+"&Clave="+Clave;
		Div=document.getElementById("log");
		div_dinamico("POST", 'principal.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}