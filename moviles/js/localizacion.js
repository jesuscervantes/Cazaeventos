		function Localizacion()
		{
			var latitud;
			var longitud;
			var precision;
			var longitudEvent;
			var latitudEvent;
			var mapa;
			var domicilio;
			var bandera=true;
			var size = new OpenLayers.Size(30,35);
			 var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
  			var myposition = new OpenLayers.Icon('imagenes/posicion.png', size, offset);
  			var iconEvent = new OpenLayers.Icon('imagenes/radar.png', size, offset);
			fromProjection = new OpenLayers.Projection("EPSG:4326");   
    		toProjection   = new OpenLayers.Projection("EPSG:900913");
    		var markers;
			this.localizacion=function()
			{
				if(sessionStorage.getItem('latitud'))
				{
					this.asignarVariables();
					mostrarDireccion();
				}
					
				else
					navigator.geolocation.getCurrentPosition(asignarCoordenadas,Error,{enableHighAccuracy:true,maximumAge:60000});	
					


				$("#mmapa").live('click',function(e){
					latitude=this.latitude;
					longitude=this.longitude;
					e.preventDefault();
					$("#mapa_canvas").css({
					height:"200px",
					marginTop:"0px",
					marginBottom:'0px'
					});
				 	$('html,body').animate({
						        scrollTop: $("#mapa_canvas").offset().top
						    }, 700);
					latitud=sessionStorage.getItem("latitud");
					longitud=sessionStorage.getItem("longitud");
					if(bandera==false)
					{
						mapa.destroy();
					}
					mapear();

					});
		
			}

			this.direction=function()
			{
				return direccion();
			}


			function Error(errors)
			{
				$('#estado').trigger('create');
				$("#estado").html("No se pudo encontrar <br><a href='#confirmacion' id='open-ubication' class='precision' data-role='button' data-mini='true' data-rel='dialog'>Dinos donde estas</a>");


			}

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
			this.coordenadasEvento=function(lat,lon)
			{
				latitudEvent=lat;
				longitudEvent=lon;
			}
			this.asignarVariables=function()
			{
				latitud=sessionStorage.getItem('latitud');
				longitud=sessionStorage.getItem('longitud');
				precision=sessionStorage.getItem('precision');
				domicilio=sessionStorage.getItem('direccion');
			}

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

			function mostrarDireccion()
			{			

				$("#estado").html(domicilio+"<br><span style='font-size:15px'>Lat: "+latitud+" / Lon: "+longitud+"</span><br><span style='font-size:14px;font-weight:normal'>Preciso en "+precision+" metros<br></span><a href='#confirmacion' id='open-ubication' class='precision' data-role='button' data-mini='true' data-rel='dialog'>No es tu ubicación?</a>");
				$('#estado').trigger('create');
				var elemento=$("#eventos");
	    		var datos="latitud="+latitud+'&longitud='+longitud;
	   			 ajax(elemento,datos,'Modelos/Eventos.php');
	    		$('#le').hide();

			}

			function mapear()
			  {

			  
			  		markers= new OpenLayers.Layer.Markers( "Markers" );
		  		    mapa = new OpenLayers.Map("mapa_canvas");
		        	var mapnik  = new OpenLayers.Layer.OSM();
		        	mapa.addLayer(mapnik);

			 	$("#mp").text("Mapa");
			 	$("#mp").css("padding","5px");
			 	console.log(latitud+","+longitud);
			    var zoom= 15;
		     	position = new OpenLayers.LonLat(longitud,latitud).transform( fromProjection, toProjection);
		     	positionEvent = new OpenLayers.LonLat(longitudEvent,latitudEvent).transform( fromProjection, toProjection);
		          
		     //    markers.clearMarkers();
		         markers.addMarker(new OpenLayers.Marker(position,myposition));
		         markers.addMarker(new OpenLayers.Marker(positionEvent,iconEvent));
		      		         mapa.addLayer(markers);
		         mapa.setCenter(position, zoom);  
		         bandera=false;
			  }

			  


		}


				

//funciones*********************************************************
		
	
		//evento para los enlaces de geolocalizacion


		


		//funcion para mostrar mapas
		
		
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



	
	


		function categoria()
		{


			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");

			var elemento=$("#eventosp");
			var datos="latitud="+latitud+'&longitud='+longitud+'&categoria='+cat+'&imagen='+imagen;

		    ajax(elemento,datos,'Vistas/Prox.php');

		    $("#cat").text(cat);
		   
		    $("#cate img").attr('src',imagen);

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
						  