<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>
	<title>CazaEventos Cerca de Mí</title>

		<? include 'Modelos/molde.php'; ?>


	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Eventos"> 
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png">
	<META HTTP-EQUIV="Pragma" CONTENT="no- cache">
	
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/evento.css" />
	<link rel="stylesheet" href="http://openlayers.org/api/theme/default/style.css" />

	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="http://openlayers.org/api/OpenLayers.js"></script>
	<script src="js/carrusel.js"></script>
	<script src="js/mapa.js"></script>
	<script src="js/modernizr.js"></script>
    <script src="js/holder.js"></script>
    <script src="js/free.js"></script> 
    <script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script>
    
	
	<script>
	/*(function(d, s, id) 
	{

		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=221202171329748";
		  fjs.parentNode.insertBefore(js, fjs);
	}
	(document, 'script', 'facebook-jssdk'));*/
	</script>
	<script type="text/javascript">



	$(document).ready(function()
	{
		mapa(<? echo $coordenada[0].",".$coordenada[1].",".$coordenada1['Latitud'].",".$coordenada1['Longitud']; ?>);

		$("#canvas").css({
				height:"220px",
				marginTop:"0px",
				marginBottom:'0px'
			});

	});

	

	</script>







<head>
	

</head>

	<body>
		<? include 'Vistas/cabecera.php'; ?>

	
		<section class="contenedor">

			<? include 'Vistas/logo.php';?>

			<h1 id="nombre"><? echo utf8_encode($eventos['Nombre']) ?></h1>

			<section class="a">

				<div class="azquierda">
					<img src="<? echo $imagen; ?>">
				</div>
				<div class="aderecha">
					<p class="bsub">Descripción</p>
					<article class="texto"><? echo utf8_encode($eventos['Descripcion']); ?></article>
				</div>

			</section>

			<section class="a">
				
				<div class="azquierda" id="canvas"></div>
				<div class="aderecha">
					<p class="bsub">Datos Generales</p>
					<center><img src="<? echo $logo;?>"></center>
					<p class="texto"><strong>Distancia: </strong><? echo $distancia; ?>m aprox.</p>
					<p class="texto"><strong>Horario: </strong><? echo $horario[0]." - ".$horario[1];?> Hrs.</p>
					<p class="texto"><strong>Domicilio: </strong><? echo utf8_encode($coordenada1['Calle'])." #".$coordenada1['Numero']." ".$coordenada1['Municipio']; ?> </p>
				</div>

			</section>

			<table width="100%">
				<tr>
					<td class="cpiecito" align="left">&nbsp;&nbsp;Regresar a Eventos</td>
					<td class="cpiecito" align="right">Web del Evento&nbsp;&nbsp;</td>
				</tr>
			</table>



		

		</section>


		<? include 'Vistas/pie.php'; ?>



	
	</body>
</html>
