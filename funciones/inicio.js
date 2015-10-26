function FncIngreso()
{
	Usuario = $("#Usuario").val();
	Llave = $("#Codigo").val();
	
	if((Usuario != '') && (Llave != ''))
	{
		Parametros = "Sesion=1"+"&Usuario="+Usuario+"&Llave="+Llave;
		Div=document.getElementById("log");
		div_dinamico("POST", 'inicio.php', Parametros, Div, false);
	}
	else
	{
		alert("Ingrese todos los campos");
	}
}