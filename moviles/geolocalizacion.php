<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title> Mind on Cloud</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	<script src="js/localizacion.js"></script>
	
	<script type="text/javascript">


		$(document).ready(

			function()
			{

				var elemento=$("#eventos");
				element=elemento;
				localizacion(elemento,coordenadas);


			});


	</script>



		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Event Point</title>
		<link rel="stylesheet" href="themes/estilo.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>


		<style type="text/css">
		body
		{
			font-family: 'Duru Sans', sans-serif;
		}

		
		#mapa_canvas
		{
			border-radius: 10px;
			overflow: hidden;
			width: 99%;
			
        	box-shadow: 0px 2px 10px #000;
		}
		
		.ubicacion
		{
			display: inline-block;
			
			vertical-align: top;
			
		}
		#mono
		{
			width: 50px;
		}

		#dom
		{
			padding-left: 30px;
		}
		#dom p
		{
			margin-top: 0px;
			font-size: 18px;
			font-family: 'Baumans', cursive;

		}


		#pie p
		{
			display: inline-block;
			width: 49%;
			font-family: 'Baumans', cursive;

			font-size: 16px;
			font-weight: bold;
		}
	#pie img
	{
		width: 70px;
	}

	#l1
		{
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 10px;
			margin-top: 0px;
		}
		.cabecera
		{
			overflow: hidden;
			height:40px;
		}

		.cabecera img
		{
			width: 200px;
			margin-top: 0px;

		}
		.eventos
		{
			font-size: 20px;
			margin-bottom: 0px;
			font-weight: bold;
			font-family: 'Baumans', cursive;
			text-align: center;
			text-shadow: 1px 1px 10px #FFF;

		}
		#eventos
		{
			margin-top: 0px;
			text-shadow: 1px 1px 10px #FFF;

		}
		.text
		{
			font-size: 16px;
			margin-top: 0px;
			float: left;
			text-align: left;
			
			width: 100%;
		}
	
		.titulo
		{
			
			font-size: 16px;
			font-weight: bold;

		}
		.hora
		{
			font-size: 14px;
		}
		#evento
		{
			text-align: center;
			font-size: 24px;
			font-weight: bold;
			font-family: 'Baumans', cursive;
		}
		.datos
		{
			display: inline-block;
			width: 100%;
			vertical-align: top;
			margin-bottom: 0px;
			font-size: 16px;
			text-align: center;
			

		}
		#contendor
		{
			max-width: 500px;
			margin:auto;
		}
		#foto
		{
			width: 100%;

		}
		#foto img
		{
			width: 100%;
			height: 170px;
			box-shadow: 0px 2px 10px #000;
		}
		.pie
		{
		font-weight: bold;


		}
		#botones
		{
			border:solid 1px;
			border-color:#045aa7;
		}
		#dt
		{
			overflow: hidden;
			
		}
		#mapa_canvas
		{
			width: 100%;
		}
		#regresar
		{
			cursor: pointer;
		}

		



		</style>


</head>

<body>

	<div data-role="page" data-theme="a" id="one">


			<div data-role="header" data-theme="a" class="cabecera">

				<a href="../../" data-icon="home" data-iconpos="notext" >Home</a>
				<a href="../nav.html" data-icon="menu" data-iconpos="notext"  data-transition="fade">Search</a>
				<center><img src="imagenes/letrero.png"></center>
			</div>





			<div data-role="content" data-theme="a" id="primera">
			
				<center><div class="ubicacion"><img src="imagenes/mono.png" id="mono"></div>
				<div class="ubicacion" id="dom"><p id="estado">Domicilio:</p></div></center>

				<p class="eventos" id="le">Eventos Cercanos</p>
				<div id="dt">

					<ul data-role="listview" data-theme="a" data-inset="true"data-divider-theme="a" id="eventos">

					</Ul>
					
				</div>


				
				
			</div>




			<div data-role="footer" data-theme="a" id="pie" data-position="fixed">
				<p>Sitio Completo</p>
				<p style="text-align:right">Registrarse</p>
				<center>
					<img src="imagenes/nube.png">
					<p style="width:100%;margin-top:0px;">Mind On Cloud</p>
				</center>


			</div>




		</div>

	

	
	

</body>
</html>