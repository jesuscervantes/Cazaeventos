<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>
	<title>Contacto</title>

	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	
    
  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Encuentra los eventos más destacados que se llevan a cabo cerca de ti"> 
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png">
	<META HTTP-EQUIV="Pragma" CONTENT="no- cache">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/contacto.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/contacto.js"></script>
    <script src="js/free.js"></script>
    <script type="text/javascript" src="jquery.ui.touch-punch.js"></script>
    <script type="text/javascript" src="jquery.ui.touch-punch.js"></script>
    
	

<head>
	

</head>

	<body>
		<? include 'Vistas/cabecera.php'; ?>

	
		<section class="contenedor">

			<? include 'Vistas/logo.php';?>

			<section class="azquierda">

				<form id="contacto">

					<input type="text" placeholder="Nombre" id="nombre" required>
					<input type="email" id="mail"placeholder="Correo" name="mail"required>
					<textarea name="Comentario" id="comentario" placeholder="Comentario" rows="8" required></textarea>
					<input type="Submit" value="Comentar" id="enviar">


				</form>


			</section>
			<section class="aderecha">
				<p class="titulo">Contáctanos y Anunciate</p>


				<ul id="social">
					<a href="http://www.facebook.com/CazaEvento?ref=hl"><li style="text-align:left"><img src="redes/face.png"></li></a>
					<a href="https://twitter.com/CazaEventoss" target="_blank"><li><img src="redes/twitter.png"></li></a>
					<a href="https://plus.google.com/104034495410191672524" rel="publisher" target="_blank"><li class="ultimo" style="text-align:right" target="_blank"><img src="redes/g+.png"></li></a>
				</ul>
				<p class="info">
					<strong>Correo:</strong>
					contacto@cazaeventos.com
				</p>
				<p class="info">
					<strong>Celular :</strong>
					(044) 3929402947 <br> 
					3929284813
				</p>
				<p class="info">Servicio por <a href="http://mindoncloud.com.mx/" target="_blank" class="mind">Mind On Cloud</a><p>
					


				
			</section>
			

				


		</section>


		<? include 'Vistas/pie.php'; ?>



	
	</body>
</html>
