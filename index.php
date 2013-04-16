<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/>

	<title>CazaEventos</title>

	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">


  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Encuentra los eventos más destacados que se llevan a cabo cerca de ti"> 
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png"type="image/x-icon" />
	<meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
            
	<meta http-equiv="Pragma" content="nocache">

	<META HTTP-EQUIV="Pragma" CONTENT="no- cache"> 

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/index.css" />

   	


	
    <style type="text/css">
  
    </style>

    <!-- javascript -->

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/carrusel.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/free.js"></script>
  
    <script>
	$(function() {
        $("#dialog" ).dialog({
            height: 205,
            autoOpen:false,
            modal: true,
            width:400,
            resizable:false,
            show: "Clip",
            hide: "explode"
        });
         $( "#radio" ).buttonset();
         $("#busquedas").click(function() {
           $( "#dialog" ).dialog( "open" );

            return false;
        });
        /*$("input[name='radio']").on("click",function() {
        	
        	$("#formulario").submit();
        	
        });*/
       
        if(!Modernizr.inputtypes.search)
        {
        	$("#dialog input").css({
        	color:"#fff",
        	width: "95%"
        	});
        }
        	


    });

      
     
	

   
    </script>
	






	

</head>

	<body>
		<div id="dialog" title="Ingresa tu Búsqueda">
		
			<form action="Busquedas" method="POST" id="formulario">
				<div id="radio">

			        <input type="radio" id="radio1" name="radio" class="rbusqueda" value="Municipio"required x-moz-errormessage="Selecciona una opción"/><label for="radio1">Por Municipio</label>
			        <input type="radio" id="radio2" name="radio" class="rbusqueda" value="Lugar" required x-moz-errormessage="Selecciona una opción"/><label for="radio2"> Por   Lugar </label>
			        <input type="radio" id="radio3" name="radio" class="rbusqueda" value="Nombre" required x-moz-errormessage="Selecciona una opción"/><label for="radio3">Por Evento</label>
			    </div>
			   
				<input type="Search" placeholder="Ingresa tu búsqueda" id="bus" name="dato" pattern="^[a-z].*" required errormessage="Ingresa tu ubicación">
				<input type="submit" value="Enviar" id="Ebusqueda" class="ui-button-text"/>
			</form>
			<br>

		</div>
		<? include 'Vistas/cabecera.php'; ?>

<section class="contenedor">

			<? include 'Vistas/logo.php';?>
			<? include 'Vistas/letras.php';?>

		
			<section id="servicios">

				<ul>
					<a href="Cercanos" title="Eventos Cercanos">
						<li id="zerca">
							<img src="servicios/1.png">
							<p>Cerca de M&iacute;</p>

						</li>
					</a>
					<a href="Proximos" title="Proximos Eventos">
						<li id="proximos">

							<center><img src="servicios/2.png" ></center>
							<p>Próximos Eventos</p>

						</li>
					</a>
					<li id="busquedas" title="Busca tu Evento">
						<center><img src="servicios/3.png"></center>
						<p>&nbsp;&nbsp;&nbsp;Búsqueda</p>
					</li>

				</ul>
			</section>


			<section id="slider">



				<div id="contenin" >
					<div id="gallery" class="slides">
						<div id="uno" class="slide">
							<div class="izquierdo">
								<h1>Accede desde tu celular</h1>
								<p class="textop">Accede desde  de tu tableta, laptop o celular, te mostraremos los eventos cercanos que se estan llevando a acabo</p>
								<p class="textop">No necesitas servicio de GPS</p>
					
							</div>

							<div class="derecho">
								<br>
								<img src="cel.png">
								
							</div>

						</div>
						
						<div id="dos" class="slide">
							<div class="izquierdo">
								<h1>Anuncia tu evento</h1>
								<p class="textop">Contactanos y anuncia tu evento, las personas te enontraran de una manera fácil </p>

								<p class="textop">Anuncia tus eventos actuales y proximos, da a conocer tus ofertas</p>
					
							</div>

							<div class="derecho">
								<br>
								<img src="bocina.png">
								
							</div>

						</div>

						<div id="tres" class="slide">
							<div class="izquierdo">
								<h1>Registrate</h1>
								<p class="textop">Registrate para que te mantengamos informado de los eventos mas destacados</p>
								<p class="textop"><b>PROXIMAMENTE . . .</b></p>
					
							</div>
							<ul>
								
							</ul>
							<div class="derecho">
								<br>
								<img src="imagenes/registrate.png">
							</div>

						</div>
					</div>
				</div>

				<ul id="promciones">
					<li class="menuItem">
						<a href="">
							<p class="numero">1</p>
							<p class="seccion">Móviles</p>
						</a>

					</li class="menuItem">
					<li class="menuItem">
						<a href="">
							<p class="numero">2</p>
							<p class="seccion">Tu Evento</p>
						</a>
					</li class="menuItem">

					<li class="menuItem">
						<a href="">
							<p class="numero">3</p>
							<p class="seccion">Resgistrate</p>
						</a>
					</li>
				</ul>




			</section>
		

		</section>


		<? include 'Vistas/pie.php'; ?>



	
	</body>
</html>
