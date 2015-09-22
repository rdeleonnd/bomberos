function div_dinamico(tipo, ajax_pagina, parametros, div_respuesta, modo)
{
	if(modo===undefined)
	{
		modo=false;
	}
	//$(div_respuesta).html("<img src='general_repository/image/ajax-loader.gif' align='center'>");
	$.ajax({type: tipo,
			url: ajax_pagina,
			data: parametros,
			async:false,
			dataType: "html",
			success: function(html){$(div_respuesta).html(html);}
			}); 
}