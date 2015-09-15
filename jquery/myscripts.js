function fncValidateKey(elEvento, permitidos) // Variables que definen los caracteres permitidos
	{
	var numeros = "0123456789";
	var numeros_guion = "0123456789-";
	var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	var numeros_caracteres = numeros + caracteres;
	var numeros_caracteres_guion = numeros + caracteres+"-";
	var teclas_especiales = [8, 37, 39, 46];// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
	 
	switch(permitidos)// Seleccionar los caracteres a partir del parámetro de la función 
		{
		case 'number':
			permitidos = numeros;
			break;
		case 'number_negative':
			permitidos = numeros_guion;
			break;
		case 'character':
			permitidos = caracteres;
			break;
		case 'character_number':
			permitidos = numeros_caracteres;
			break;
		case 'character_number_negative':
			permitidos = numeros_caracteres_guion;
			break;
		}
	 
	var evento = elEvento || window.event; // Obtener la tecla pulsada
	var codigoCaracter = evento.charCode || evento.keyCode;
	var caracter = String.fromCharCode(codigoCaracter);
	 
	var tecla_especial = false;// Comprobar si la tecla pulsada es alguna de las teclas especiales (teclas de borrado y flechas horizontales)
	for(var i in teclas_especiales) 
		{
		if(codigoCaracter == teclas_especiales[i]) 
			{
			tecla_especial = true;
			break;
			}
		}
	return permitidos.indexOf(caracter) != -1 || tecla_especial;// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos o si es una tecla especial
	}
	
function ajax_dynamic_div(tipo, ajax_page, params, div_resp, modo)
	{
	if(modo===undefined)
		{
		modo=false;
		}
	//$(div_resp).html("<img src='images/loading.gif' align='center'>");
	$.ajax({type: tipo,
			url: ajax_page,
			data: params,
			async:modo,
			dataType: "html",
			success: function(html){$(div_resp).html(html);}
			}); 
	}
function fncModal(src)
               {
               $("body").append("<div id='dialog_jquery'></div>");
               var dialogo=$( "#dialog_jquery" ).dialog({
                                                                autoOpen: false,
                                                                resizable: false,
                                                                height: 700,
                                                                width: 850,
                                                                modal: true,
                                                                title: 'Nuestro Diario',
                                                                closeText:'Cerrar',
                                                                closeOnEscape: false,
                                                                show: {effect: "blind",duration: 500 },
                                                              hide: {effect: "blind",duration: 500},
                                                              buttons: {'Cerrar': function() {$( this ).dialog( "close" ); }},
                                                              beforeClose: function(){ $('#dialog_jquery').remove();}
                                                              });    
               dialogo.load(src).dialog('open');
               }

function fncShowDiv(divName)
	{
	document.getElementById(divName).style.visibility = 'visible';
	}
function fncHiddenDiv(divName)
	{
	document.getElementById(divName).style.visibility = 'hidden';
	}	

	
function fncValidate(objName,option)
	{
	obj=document.getElementById(objName).value;
	switch(option)
		{
		case 'id':
			if((obj!='null')&&(obj!=''))
				return 0;
			else
				return 1;
			break
		}
	}
function fncChangeImg (id,img) {
  id.src = img;
 }
function fncAlert(message)
	{
	$('#dialogDetail').html(message);
	document.getElementById('modal').click();	
	}	