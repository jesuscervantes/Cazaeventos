<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>
	<title>CazaEventos Búsquedas</title>

	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/evento.css" />
	<link rel="stylesheet" href="css/cercanos.css" />
	<link rel="stylesheet" href="css/busqueda.css" />
	<link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>

	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="js/localizacion.js"></script>
	<script src="js/confirmacion.js"></script>
	<script src="js/modernizr.js"></script> 
	<script src="js/holder.js"></script>
    <script src="js/free.js"></script> 

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

		  function busqueda()
		{


			var latitud=sessionStorage.getItem("latitud");
			var longitud=sessionStorage.getItem("longitud");

			var elemento=$("#ajax");
			var dato="<? echo $_POST['dato'] ?>";
			var radio="<? echo $_POST['radio']; ?>";
				
			var datos="latitud="+latitud+'&longitud='+longitud+'&dato='+dato+'&radio='+radio ;
		    ajax(elemento,datos,'Modelos/busquedas.php');

	


		}

	
		    $(document).on('ready',function(){

		    	var elemento=$("#ajax");
		        if(sessionStorage.getItem("longitud"))
		        {
		            busqueda();
		        }
		        else
		        {
		  			confirmar("buscar");
		  		}
		    });
		    

	</script>


	
	





<head>
	

</head>

	<body>
		<div id="dialog-confirm" title="Eventos cerca de tí">
		    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Para encontrar los eventos cercanos es necesario compartir tu ubicación</p>
		</div>
		<? include 'Vistas/cabecera.php'; ?>

		<section class="contenedor">

			<? include 'Vistas/logo.php';?>
			<div id="cabecerita">
				<p><img src="servicios/3.png" class="alogo"></p>
				<p class="stitulo">Resultados de la Búsqueda</p>
			
			</div>
			<div id="ajax">
		
 			</div>


		

		</section>


		<? include 'Vistas/pie.php'; ?>



	
	</body>
</html>
