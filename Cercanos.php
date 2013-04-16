<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>
	<title>CazaEventos Cerca de Mí</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	
  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Cerca de Mí"> 
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png">
	<META HTTP-EQUIV="Pragma" CONTENT="no- cache">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/cercanos.css" />
	<script src="http://openlayers.org/api/OpenLayers.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="js/carrusel.js"></script>
	<script src="js/localizacion.js"></script>
	<script src="js/cercanos.js"></script>
	<script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script>
	<script src="js/modernizr.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/free.js"></script> 
    <script src="js/confirmacion.js"></script> 
    <script src="js/direccion.js"></script> 

	
	

	





<head>
	

</head>

	<body>
		<div id="dialog-confirm" title="Eventos cerca de tí">
		    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Para encontrar los eventos cercanos es necesario compartir tu ubicación</p>
		</div>

		<div id="dialog-direction" title="Compartenos tu ubicación">
			<p>Ingresa la dirección donde te encuantras para poder encontrar tus eventos</p>
			
				<input type="text" placeholder="Calle,número y municipio" required id="text-ubication">
				
			<div id="mapa-direction">
			</div>
			<p id="direction-buttom">Listo</p>
		</div>
		<? include 'Vistas/cabecera.php'; ?>

		<section class="contenedor">

			<? include 'Vistas/logo.php';?>


			<div data-role="content" data-theme="a" id="segunda">
			
				<center>

					<div class="ubicacion">
						<img src="hombre.png" id="mono">
					</div>

					<div class="ubicacion" id="dom">
						<p id="estado">Mi Ubicacion</p>
					</div>

				</center>
				

				<p id="distancia">
				    <label for="amount">Distancia: </label>
				    <input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" />
				</p>
				 
				<div id="barra"></div>
				<br> 


				<p class="eventos" id="le">Eventos Cercanos</p>
				<div id="dt">

					<ul id="eventos" itemtype="http://data-vocabulary.org/Event">

					</Ul>
					
				</div>


				
				
			</div>




			


		</div>

		</section>


		<? include 'Vistas/pie.php'; ?>



	
	</body>
</html>
