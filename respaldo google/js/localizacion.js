
		//evento para los enlaces de geolocalizacion
		$(".enlace").live('click',function(){
			var elemento=$("#ajaxmolde");
			var bandera=false;
			cargar($(this),elemento,bandera);
		});


		//evento para los enlaces de proximos
		$(".enlacep").live('click',function(){
			var elemento=$("#ajaxmolde");
			var bandera=$('#regresar');
			cargar($(this),elemento,bandera);

		});



		
		var element;
			//Función para geolocalización
		function localizacion(elemento,metodo,encontrar)
		{

			elemento.text("Buscando...");
			sessionStorage.setItem("metodo",encontrar);
			navigator.geolocation.getCurrentPosition(metodo,Error,{enableHighAccuracy:true});

			
		}


		function coordenadas(position)
		{
			
			
			sessionStorage.setItem("latitud",position.coords.latitude);
			sessionStorage.setItem("longitud",position.coords.longitude);
			sessionStorage.setItem("precision",position.coords.accuracy);
			var latLng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
  			var geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 'latLng': latLng },processGeocoder);

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



		//Función para actualizar distancia

		function actualizar(elemento,metodo,distance)
		{

			if(sessionStorage.getItem("longitud"))
			{
				var distancia=distance;
				var latitud=sessionStorage.getItem("latitud");
				var longitud=sessionStorage.getItem("longitud");
	  			var datos="latitud="+latitud+'&longitud='+longitud+'&distancia='+distancia;
			    ajax(elemento,datos,'Modelos/Eventos.php');
			}
			else
			{
				var distancia=distance;
				navigator.geolocation.getCurrentPosition(function(posicion) {
				var latitud= posicion.coords.latitude;
				var longitud= posicion.coords.longitude;	
			    var datos="latitud="+latitud+'&longitud='+longitud+'&distancia='+distancia;
			    ajax(elemento,datos,'Modelos/Eventos.php');
	    		},Error);
			}
			
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







		//funcion para cargar eventos por geolocalizacion

		function mostrar()
		{
			

			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");
  			var precision = sessionStorage.getItem("precision");
  			var direccion= sessionStorage.getItem("direccion");
			
  	
			$("#estado").html("<p id='l1' style='font-size:24px'>"+direccion+"<br> <span id='data-coords'>Latitud: "+latitud+" &nbsp;&nbsp;/&nbsp;&nbsp;Longitud: "+longitud+"</span><br><span class='precision'>Preciso en "+precision+" metros</span>&nbsp;&nbsp;<span id='open-ubication' class='precision'>No es tu ubicación?</span>");

			var elemento=$("#eventos");
		    var datos="latitud="+latitud+'&longitud='+longitud;
		    ajax(elemento,datos,'Modelos/Eventos.php');
		    $('#le').hide();
		    latitud0=latitud;
		    longitud0=longitud;
		    


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



		    function processGeocoder(results, status)
		    {

				if (status == google.maps.GeocoderStatus.OK) 
				{
					if (results[0]) 
					{
						var direccion=results[0].formatted_address;
						sessionStorage.setItem("direccion",direccion);

						var metodo=sessionStorage.getItem("metodo");
						switch(metodo)
						{
							case "mostrar":

							mostrar();
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
				}
			}
						  



						  
					
						 