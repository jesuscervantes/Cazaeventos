		
		var latitud0,longitud0;
		
	
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

		


		//funcion para mostrar mapas
		$("#mmapa").live('click',function(){
			

			 $('html,body').animate({
			        scrollTop: $("#mapa_canvas").offset().top
			    }, 700);
			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");
			mapa(latitud,longitud);
		});
		
		
		var element;	

		//funcion para cargar evento de geolocalizacion
		function cargar(evento,elemento,bandera)
		{

			var Negocio=$(evento).find(".neg").text();
			var Distancia=$(evento).find(".distancia").text();
			var Id=$(evento).attr("id")
		    var datos="Id="+Id+'&Distancia='+Distancia+'&Negocio='+Negocio;
		    ajax(elemento,datos,'Modelos/Evento.php');
		}



		function Error(errors)
		{
			$('#estado').trigger('create');
			$("#estado").html("No se pudo encontrar <br><a href='#confirmacion' id='open-ubication' class='precision' data-role='button' data-mini='true' data-rel='dialog'>Dinos donde estas</a>");


		}

		//funcion para geolocalizacion

		function localizacion(elemento,metodo,encontrar)
		{
			
			elemento.text("Buscando...");
			sessionStorage.setItem("metodo",encontrar);
			navigator.geolocation.getCurrentPosition(metodo,Error);
			
		}
	
		function coordenadas(position)
		{
			var metodo=sessionStorage.getItem("metodo");
			sessionStorage.setItem("latitud",position.coords.latitude);
			sessionStorage.setItem("longitud",position.coords.longitude)
			sessionStorage.setItem("precision",position.coords.accuracy);
			var latLng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
  			var geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 'latLng': latLng },processGeocoder);

			
		}


		function categoria()
		{


			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");

			var elemento=$("#eventosp");
			var datos="latitud="+latitud+'&longitud='+longitud+'&categoria='+cat+'&imagen='+imagen;

		    ajax(elemento,datos,'Vistas/Prox.php');

		    $("#cat").text(cat);
		    

		}






		//funcion para cargar eventos por geolocalizacion

		function mostrar()
		{

			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");
			var precision = sessionStorage.getItem("precision");
			var direccion= sessionStorage.getItem("direccion");
			
			
			$("#estado").html(direccion+"<br><span style='font-size:15px'>Lat: "+latitud+" / Lon: "+longitud+"</span><br><span style='font-size:14px;font-weight:normal'>Preciso en "+precision+" metros<br></span><a href='#confirmacion' id='open-ubication' class='precision' data-role='button' data-mini='true' data-rel='dialog'>No es tu ubicación?</a>");
			$('#estado').trigger('create');
			var elemento=element;
		    var datos="latitud="+latitud+'&longitud='+longitud;
		    ajax(elemento,datos,'Modelos/Eventos.php');
		    $('#le').hide();
		    latitud0=latitud;
		    longitud0=longitud;

		}

		//funcion para la busquedas
		function buscar()
		{
			
			var radio = $('[name="Categoria"]:checked').val();
			var dato=$('#dato').val();
			var elemento=$("#resultado");
			var datos="radio="+radio+"&dato="+dato;
			ajax(elemento,datos,'Modelos/resultado.php');

		}


		//funcion para el cambio de fecha
		function fecha(posicion)
		{

			
			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");

			cat=$("#cat").text();

			
			var elemento=$("#eventosp");

			var datos="latitud="+latitud+'&longitud='+longitud+'&categoria='+cat+"&fecha="+$("#fechac").val();

		    ajax(elemento,datos,'Vistas/Prox.php');

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
				            cambio(pagina);
				             
  	
				        }
				    });
				    
		    }




		    //funcion para el cambio de pagina
		    function cambio(pagina)
		    {
		    	switch(pagina)
		    	{
		    		case 'Modelos/Eventos.php':
		    		$("#eventos").listview('refresh');
		    		break;

		    		case 'Modelos/Evento.php':


		    		$('#contendor').trigger('create');
		    		$('#ajaxmolde').trigger('create');

		    		break;

		    		case 'Vistas/Prox.php':

		    		$("#eventosp").listview('refresh');

		    		break;

		    		case 'Modelos/resultado.php':

		    		$('#resultado').trigger('create');

		    		break;


		    	}

		    }




		    //funcion para mostrar mapa
		function mapa(latitud,longitud,latitudee,longitudee)
		 {
		 		$("#mapa_canvas").css({
				height:"200px",
				marginTop:"0px",
				marginBottom:'0px'
			});
		 	$("#mp").text("Mapa");
		 	$("#mp").css("padding","5px");

		
		 	var coordenada= new google.maps.LatLng(latitud,longitud);
			var opciones={

				zoom:14,
				center:coordenada,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var Mapa= new google.maps.Map(document.getElementById("mapa_canvas"),opciones);

			var opciones2={
				position:coordenada,
				map:Mapa,
				title: "Mi ubicación",
				icon: 'imagenes/posicion.png'
			}
			

			var evento= new google.maps.LatLng(latitude,longitude);

			var eventop={
							position:evento,
							map:Mapa,
							title: "Evento",
							icon: 'imagenes/radar.png',
							animation: google.maps.Animation.BOUNCE
						};

			var globo=new google.maps.Marker(opciones2);
			var eventom=new google.maps.Marker(eventop);
			

		 }

		function actualizar(elemento,distance)
		{
			var distancia=distance;
			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");
	      	var elemento=$("#eventos");
		    var datos="latitud="+latitud+'&longitud='+longitud+'&distancia='+distancia;
		    ajax(elemento,datos,'Modelos/Eventos.php');
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
							categoria();
							break;

							case "fecha":
							fecha();
							break;

							case "buscar":
							buscar();
							break;
						}

					} 
				}
			}
						  