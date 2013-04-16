		function Localizacion()
		{
			var latitud;
			var longitud;
			var presicion;
			var domicilio;
			


			//función inicial de geolocalizacion en el navegador
			this.localizacion=function()
			{
				
				navigator.geolocation.getCurrentPosition(asignarCoordenadas,Error,{enableHighAccuracy:true});	
			}

	
			//funcion para mostrar dirección
			function mostrarDireccion()
			{						
				$("#estado").html("<p id='l1' style='font-size:24px'>"+domicilio+"<br> <span id='data-coords'>Latitud: "+latitud+" &nbsp;&nbsp;/&nbsp;&nbsp;Longitud: "+longitud+"</span><br><span class='precision'>Preciso en "+precision+" metros</span>&nbsp;&nbsp;<span id='open-ubication' class='precision'>No es tu ubicación?</span>");
					var elemento=$("#eventos");
		    		var datos="latitud="+latitud+'&longitud='+longitud;
		   			 ajax(elemento,datos,'Modelos/Eventos.php');
		    		$('#le').hide();

			}

			//funcion para asignar las coordenadas e iniciar la sesión
			function asignarCoordenadas(position)
			{

				sessionStorage.setItem("latitud",position.coords.latitude);
				sessionStorage.setItem("longitud",position.coords.longitude);
				sessionStorage.setItem("precision",position.coords.accuracy);
				latitud=position.coords.latitude;
				longitud=position.coords.longitude;
				precision=position.coords.accuracy;
				direccion();
			
			}
			//función pública para asignar valores a las variables de sesión
			this.asignarVariables=function()
			{
				latitud=sessionStorage.getItem('latitud');
				longitud=sessionStorage.getItem('longitud');
				precision=sessionStorage.getItem('precision');
				domicilio=sessionStorage.getItem('direccion');
			}
			//funcion para solicitar la dirección en base a las coordenadas
			function direccion()
			{

	          var geoCodeURL = " http://nominatim.openstreetmap.org/reverse?format=json&lat="+latitud+"&lon="+longitud+"=18&addressdetails=1";

	             $.getJSON(geoCodeURL,
		        function(data) 
		        {
		        	var datos=String(data.display_name);

		        	sessionStorage.setItem("direccion",datos);
		        	domicilio=datos;
		        	mostrarDireccion();
		           
		        });

			}
			//funcion publica para accesar a la funcion privada de la direccion
			this.direction=function()
			{
				return direccion();
	       	}
	       	//funcion publica para accesar a la funcion privada para mostrar la direccion 
	       	this.mostrarDireccion=function()
	       	{
	       		return mostrarDireccion();
	       	}
	       	//funcion ajax
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
		    // funcion para capturar los errores en la funcion ajax
		    function Error(error)
			{
			
				if(error.code == 0)
	       			$("#estado").html("Error Desconocido <br><span id='open-ubication' class='precision'>Dinos donde estas</span>");
	         	else if(error.code == 1)
	        		$("#estado").html("No fue posible encotrarte <br><span id='open-ubication' class='precision'>Dinos donde estas</span>");
	         	else if(error.code == 2)
	        		$("#estado").html("No hay una ubicacion disponible<br><span id='open-ubication' class='precision'>Dinos donde estas</span>");	
	         	else if(error.code == 3)
	            	$("#estado").html("Tiempo agotado<br><span id='open-ubication' class='precision'>Dinos donde estas</span>");	
	        	else
	           		$("#estado").html("Error Desconocido <br><span id='open-ubication' class='precision'>Dinos donde estas</span>");
			}
			//funcion para procesar los metodos donde se solicite la funcion de geolocalizacion
			this.procesar= function(metodo)
		    {
					switch(metodo)
					{
						case "mostrar":
						this.asingarVariables();
						mostrarDireccion();
						break;

						case "categoria":
						tipo();
						break;

						case "fecha":
						fecha();
						break;

						case "buscar":
						busqueda();
						break;
					}
			}

			//funcion publica para actualizar los eventos
			this.actualizar=function(elemento,distance)
			{
				if(sessionStorage.getItem("longitud"))
				{
					var distancia=distance;
					var latitud=sessionStorage.getItem("latitud");
					var longitud=sessionStorage.getItem("longitud");
		  			var datos="latitud="+latitud+'&longitud='+longitud+'&distancia='+distancia;
				    ajax(elemento,datos,'Modelos/Eventos.php');
				    return true;
				}
				else
				{
					return false;
					
				}
				
			}
		}

		//funcion para cargar evento de geolocalizacion
		function cargar(evento,elemento,bandera)
		{

			var Negocio=$(evento).find(".titulo").text();
			var Distancia=$(evento).find(".distancia").text();
			var Id=$(evento).attr("id")
		    var datos="Id="+Id+'&Distancia='+Distancia+'&Negocio='+Negocio;
		    ajax(elemento,datos,'Modelos/Evento.php');

		
		}


		function categoria()
		{
			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");
	  			
			var elemento=$("#eventosp");
			var datos="latitud="+latitud+'&longitud='+longitud+'&categoria='+cat;
		    ajax(elemento,datos,'Vistas/Proximos.php');
		    $("#cat").text(cat);
		}

		function tipo()
		{
			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");
			var precision = sessionStorage.getItem("precision");
			var elemento=$("#eventos");	
		    var datos="latitud="+latitud+'&longitud='+longitud;
		    ajax(elemento,datos,'Modelos/cat.php'); 
		}

		//funcion para el cambio de fecha
		function fecha()
		{


			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");
			cat=$("#cat").text();
			
			var elemento=$("#eventosp");
			var datos="latitud="+latitud+'&longitud='+longitud+'&categoria='+cat+"&fecha="+$("#fechac").val();

		    ajax(elemento,datos,'Modelos/cat.php');

		    $("#cat").text(cat);

		}

		//funcion ajax
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