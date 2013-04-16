<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CazaEventos</title>
		<link rel="stylesheet" href="themes/estilo.min.css" />
		<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>


		

		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
		<link rel="stylesheet" href="css/index.css" id="estilo"/>
		<link rel="stylesheet" href="" id="localizacion"/>
		<link rel="stylesheet" href="" id="calendario"/>
		<link rel="stylesheet" href="" id="fecha"/>
		
		


		<script type="text/javascript">
				var coords0=new Array();
				

			$(document).ready(function() {
				
				$("a").css("color","white");
				$("#menub a").css("color","#045aa7");
			});


			function loadScript(url, callback) {
			  var script = document.createElement('script');
			 
			  if (script.readyState) { // IE
			    script.onreadystatechange = function () {
			      if (script.readyState === 'loaded' || script.readyState === 'complete') {
			        script.onreadystatechange = null;
			        callback();
			      }
			    };
			  } else { // Others
			    script.onload = function() {
			      callback();
			    };
			  }
 
			  script.src = url;
			  document.getElementsByTagName('head')[0].appendChild(script);
			}
		</script>



		<script type="text/javascript" src="js/paginas.js"></script>
		<script type="text/javascript" src="js/param.js"></script>
		

		<style type="text/css">

			#radios label, #dato,#enviar
			{
				font-family: 'Baumans', cursive;
				text-align: center;
				font-weight: bold;
			}
			
		
		</style>
	</head>
	<body>

	
		<!-- pagina 1 Secciones!-->
		<?  include 'Vistas/uno.php';?>

		<!-- Fin Secciones -->





		<!-- pagina 2  Geolocalizacion !-->

		<?  include 'Vistas/dos.php';?>

		<!-- Fin geolocalizacion -->





		<!--molde para categorias -->

				<?  include 'Vistas/moldec.php';?>
		
		<!-- Fin molde categorias-->






		<!-- Pagina Calendario -->

		
			<?  include 'Vistas/Calendario.php';?>
		<!-- Fin Calendario -->




		<!-- pagina molde de Eventos -->

			<?  include 'Vistas/moldev.php';?>

		<!-- Fin Eventos -->


		<!-- Dialogo -->

		<?  include 'Vistas/menu.php';?>


		<!-- fin de dialogo -->



		<!-- busqueda -->

		<?  include 'Vistas/categoria.php';?>

		<!-- Fin busqueda -->


		<!-- resultados -->

		
		<?  include 'Vistas/resultados.php';?>


		<!-- fin resultados -->


		<!-- Registro -->




	
	<div data-role="page" data-theme="a" id="registro" data-inset="false">


			<div data-role="header" data-theme="a" class="cabecera">

				<a href="index.php" data-icon="home" data-iconpos="notext" data-transition="slide">Home</a>
				<a href="#menu" data-icon="menu" data-rel="dialog"  data-iconpos="notext"  data-transition="pop">Próximos</a>
				<center><img src="http://cazaeventos.com/imagenes/letrero.png"></center>
			</div>





			<div data-role="content" data-theme="a" id="regC">
				<p class="titulos">Contácto</p>
				<p class="texto">Comparte tus comentarios y sugerencias, tus datos serán tratados con confidencialidad</p>
			
			

		

				<form action="resgistro.php" method="get" id="registrof"> 

					
					
					<input type="text" name="nombre" id="username" value="" placeholder="Tu nombre completo"  required/>
					
					
				
					<input type="email" name="correo" id="username" value="" placeholder="Correo electrónico"  required/>
			
					<textarea name="textarea" id="textarea" style="height:100px"></textarea>
			
					<input type="submit" value="Resgistrarse" placeholder="tu comentario" />
					


				 </form>



				
				
			</div>




			<div data-role="footer" data-theme="a" id="pie" data-position="fixed">
				<p>Sitio Completo</p>
				<p style="text-align:right"><a href="#registro" data-transition="slide">Registrarse</a></p>
				<center>
					<img src="http://cazaeventos.com/imagenes/nube.png">
					<p style="width:100%;margin-top:0px;" data-transition="slide">Mind On Cloud</p>
				</center>


			</div>




		</div>



		<!-- fin registro -->
 

		
	</body>
</html>