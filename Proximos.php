<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>
	<title>CazaEventos Próximos</title>


	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	
  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Proximos Eventos"> 
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png">
	<META HTTP-EQUIV="Pragma" CONTENT="no- cache">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/evento.css" />



	<style type="text/css">

		#cabecerita
		{
			width: 100%;
			overflow: hidden;
		}
		.alogo
		{
			width: 150px;
			float: left;
		}
		.alogo img
		{
			width: 100%;
		}
		.titulo
		{
			float:left;
			margin-left: 15px;
			width:300px;
			font-size: 35px;
			font-weight: bold; 
			margin-top: 35px;

		}
		#categorias
		{
			margin-bottom: 40px;
		}
		#categorias td
		{
		
			overflow: hidden;
		}
		.categoria
		{
			width: 80px;
			height: 80px;
		}
		#dialog-confirm
		{
			width: 0;
			height: 0;
			overflow: hidden;
		}






	</style>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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




<head>
	

</head>

	<body>
		<? include 'Vistas/cabecera.php'; ?>

	
		<section class="contenedor">
		

			<? include 'Vistas/logo.php';?>

			<div id="cabecerita">
				<p><img src="servicios/2.png" class="alogo"></p>
				<p class="titulo">Próximos Eventos</p>
			
				<h2 style="float:left;width:100%;margin-top:-10px"><center>Selecciona una Categoría</center></h2>
			</div>


			<center>
							<table cellspacing="8" id="categorias"> 

							 	<?
							 		include 'Conexion.php';

									$conexion=new Conexion("marker","localhost","root","6374");

									$sql='SELECT Archivo,Nombre from Imagenes where Id IN(SELECT Icono from Categoria)';

									$imagenes=$conexion->Resultado($sql);
									$bandera=false;
									$contador=0;
									?>
										<tr>
									<?
								while($renglon =mysqli_fetch_row($imagenes))
								{
									
									 $bandera;
									if($contador==3)
									{
										?>
											</tr>
											<tr>

										<?
										
										$bandera=true;
									}

									if($bandera==0)
										$contador++;
									else
									{
										$contador=1;
										$bandera=false;
									}

									
									

								?>
								<td><center><a href="Eventos.php?id=<? echo $renglon[1]; ?>&imagen=<? echo $renglon[0]; ?>" class="seccion" name="<? echo $renglon[0]; ?>" id="<? echo $renglon[1]; ?>"><img src="<? echo $renglon[0]; ?>" title="<? echo $renglon[1]; ?>"  class="categoria"></center></a></td>
									<?
									  
								}


							 	?>
							 </tr>
							</table> 


						</center>
				

		

		</section>


		<? include 'Vistas/pie.php'; ?>




	
	</body>
</html>
