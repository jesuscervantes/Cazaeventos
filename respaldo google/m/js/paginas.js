	var cat;
	var imagen;


	//metodo para cargar pagina de geolocalizacion
	$('#dos').live('pageinit',function(event)
		{
			
  				document.getElementById('localizacion').href='css/localizacion.css';
					loadScript("js/localizacion.js",localizar);
					opcion=1;

					$( "#slider-step" ).bind( "change", function(event,ui) {
	 					var elemento=$("#eventos");
	 					actualizar(elemento,$(this).val());

				});

				$("#eventos").css("border-radius","5px");
				var elemento=$("#eventos");

		});



	//metodo para geolocalizar en la pagina  de geolocalizacion


	function localizar()
	{
		var elemento=$("#eventos");
		element=elemento;
		switch(opcion)
			{
				case 1:
				localizacion(elemento,coordenadas,"mostrar");
				break;

				case 2:
				localizacion(elemento,coordenadas,"categoria");
				break;

			}

		
		
		}


		$("#menu").live('pageinit',function(event)
		{
			$("#menub a").css("color","#fff");
		});


		$("#confirmacion").live('pageinit',function(event)
		{
				loadScript("js/direccion.js",direccion);

			$("#direction-buttom").css("display","none");

			function direccion()
			{
				$("#form-direction").submit(
	            function(e)
	            {
	              e.preventDefault();
	              $("#mapa-direction").css("height","200px");
	              $("#direction-buttom").css("display","block");
	              updatemapa();
	              codeAddress();

         		});
			}

		});



	//metdo para cargar busqueda
	$('#busqueda').live('pageinit',function(event)
		{
			
  			document.getElementById('calendario').href='css/calendario.css';
  			document.getElementById('localizacion').href='css/localizacion.css';

  			$(".ui-btn-text").css("color","#fff");
  			$('#enviar').live('click',function()
  				{

			     if (typeof coordenadas == 'function') 
			    {
					buscar();
				}
				else
				{
					loadScript("js/localizacion.js",bus);
				}
  					
  			});

  		function bus()
  		{

  			var elemento=$("#resultado");
  			localizacion(elemento,coordenadas,"buscar")
  		}
		
  			

	});


	//registro


	$('#registro').live('pageinit',function(event)
		{
			document.getElementById('calendario').href='css/calendario.css';
		});


	//metodo para cargar pagina de calendario

	$('#tres').live('pageinit',function(event)
		{
			
	  		document.getElementById('calendario').href='css/calendario.css';

	  		$('.categoria').live('click',function()
			{
				cat=$(this).attr('Id');
				eventt();
				imagen=$(this).attr('src');
				$("#cate img").attr('src',imagen);

			});

			$("#todos").live('click',function()
			{
				cat="Todas";
				eventt();
				
			});

			function eventt()
			{
				var elemento=$("#eventosp");
				opcion=2;

				if (typeof coordenadas == 'function')
			     { 
			   		if(sessionStorage.getItem("longitud"))
						categoria();
					else
						localizacion(elemento,coordenadas,"categoria");
						
	
				}
				else
				{

					loadScript("js/localizacion.js",catcoords);
					
				}

			     
			}
  			  			
  		});




	//metodo para cargar pagina de categorias

	$('#moldecat').live('pageinit',function(event)
		{
		  	document.getElementById('localizacion').href='css/localizacion.css';
  			$(".ui-btn-text").css("color","#fff","width","100%") ;	
  			$(".ui-input-text").css("color","#fff") ;

  			$('#efecha').live('click',function()
  				{
  					var elemento=$("#eventosp");
			     if (typeof coordenadas == 'function')
			     { 
			   		if(sessionStorage.getItem("longitud"))
			   		{
			   			
						fecha();
					}
					else
					{


						localizacion(elemento,coordenadas,"fecha");
					}
				}
				else
				{

					loadScript("js/localizacion.js",fechacoords);
					
				}


				

				
  					
  				});

				$(".ui-input-datebox").css({background:"transparent",marginBottom:"10px",width:"96%"})
		
		});
			function fechacoords()
			{
				localizacion(elemento,coordenadas,"fecha");
								
			}
			function catcoords()
			{
				var elemento=$("#eventosp");
				localizacion(elemento,coordenadas,"categoria");
								
			}






		