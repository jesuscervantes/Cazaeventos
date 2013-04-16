<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>
	<title>CazaEventos Cerca de Mí</title>

	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	
  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Cerca de Mí"> 
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png">
	<META HTTP-EQUIV="Pragma" CONTENT="no- cache">
	<script src="js/modernizr.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/free.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
	

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/cercanos.css" />
	<script src="js/carrusel.js"></script>
	<script src="js/localizacion.js"></script>
	<script src="js/cercanos.js"></script>
	<script type="text/javascript" src="jquery.ui.touch-punch.js"></script>
	
	

	<style type="text/css">
	#ui-datepicker-div
	{
		font-family: 'Baumans', cursive;
	}

	#distancia
	{
		color:#fff;
		font-weight: bold;
		font-size: 20px;

	}
	#amount
	{
		text-align: center;
		background-color: #045aa7;
		color:#fff;
		width: 100px;	
		background-image:none;
	}
	.ui-slider
	{
		border-color: #fff;
		background-color:#fff; 
	}
	#barra
	{
		box-shadow: 0px 0px 6px #fff;
		background-image:url(imagenes/barra.png); 
		width: 99%;	
	}


	</style>
	
	





<head>
	

</head>

	<body>
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

					<ul id="eventos">

					</Ul>
					
				</div>


				
				
			</div>




			


		</div>

		</section>


		<? include 'Vistas/pie.php'; ?>



	
	</body>
</html>
