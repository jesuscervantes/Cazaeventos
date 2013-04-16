		function ajax(elemento,consulta,pagina)
		    {	
		    	$(document).scrollTop();	
		    	var $contenidoAjax = $(elemento).html('<center><br><br><br><img src="imagenes/cargando.gif" /><br><br><br><br></center>');
				    $.ajax({
				        data: consulta,
				        type:  'post',
				        url : pagina,
				        success : function (data)
				        {
				           
				            $contenidoAjax.html(data);

				        }
				    });
				    
		    }