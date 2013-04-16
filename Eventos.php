<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>

	<?
		if(isset($_GET['id']))
			$_SESSION['Id']=$_GET['id'];
		if(isset($_GET['imagen']))
			$_SESSION['imagen']=$_GET['imagen'];
	

		$opcion=$_SESSION['Id'];
		$imagen=$_SESSION['imagen'];
	?>

	<title><? echo $opcion ?></title>

	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Categorias"> 
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png">
	<META HTTP-EQUIV="Pragma" CONTENT="no- cache"> 
	
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/evento.css" />
	<link rel="stylesheet" href="css/eventos.css" />
	<link rel="stylesheet" href="css/cercanos.css" />
	<link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>	
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>    
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/jquery-ui-1.9.1.custom.js"></script>
    <script src="js/confirmacion.js"></script>
	<script src="js/localizacion.js"></script>
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

	 $(function() {
        $( "#datepicker" ).datepicker();
    	if(sessionStorage.getItem("longitud"))
	        {
	        	
			   tipo();

  		 	}
	    else
	        {
	        	
	  			confirmar("categoria");
  			}

    });
	
	
	  $("#ef").live("click",function(event) {

	  	event.preventDefault();
	  	var fecha=$("#datepicker").val();
	    var consulta="fecha="+fecha+"&fh=true";
	  	var elemento=$("#eventos");	
	  	ajax(elemento,consulta,'Modelos/cat.php');


	  });
	 
	</script>








<head>
	

</head>

	<body>
		<? include 'Vistas/cabecera.php'; ?>

	
		<section class="contenedor">
				<div id="dialog-confirm" title="Eventos cerca de tí">
				    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Para encontrar los eventos cercanos es necesario compartir tu ubicación</p>
				</div>

			<? include 'Vistas/logo.php';?>

			<div id="Seccion">

				<div id="aizquierda">

					<img src="<? echo $imagen; ?>">
					<p><? echo $opcion; ?></p>

				</div>			
				<div id="aderecha">
					<form>
						<input type="text" placeholder="Fecha" id="datepicker" required>
						<input type="submit" value="Ver Fecha" id="ef">
					</form>

				</div>
			</div>
			<ul id="eventos" itemtype="http://data-vocabulary.org/Event">
				
				
			</Ul>



		

		</section>


		<? include 'Vistas/pie.php'; ?>



	
	</body>
</html>
