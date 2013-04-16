<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8"/>
	<title>Xamay Xtremo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Averia+Gruesa+Libre|Imprima|Comfortaa|Handlee|Short+Stack|Caesar+Dressing|Gochi+Hand|Delius+Unicase|Architects+Daughter' rel='stylesheet' type='text/css'>
	
       
	<link href="css/estilog.css" rel="stylesheet" />
	<link href="css/estilonormal.css" rel="stylesheet" />
	<link href="css/indexnormal.css" rel="stylesheet" />
	<link href="css/admin.css" rel="stylesheet" />
	<link href="css/productos.css" rel="stylesheet" />

	<script  src="js/modernizr.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/registro.js"></script>
	<script src="js/free.js"></script>
	<script src="js/clave.js"></script>

	<link type="text/css" href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<link href="css/mediano/estilomediano.css" rel="stylesheet" media="only screen and (max-width: 768px)" />
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<!--[if lt IE 9]>
		<script src="jquery.snippet.js" type="text/javascript" charset="utf-8"></script>

	<script src="jquery.ez-bg-resize.js" type="text/javascript" charset="utf-8"></script>
	<script src="holder.js"></script>

	<style>
		
		@import url(http://fonts.googleapis.com/css?family=Caesar+Dressing|Imprima);

		body
		{
			font-family: 'Imprima', sans-serif;
		}

		header
		{
			background-image: url(imagenes_ie/headie.png);
			width:940px;
		}
		#contenedor
		{
			width:760px;
		}
	
		
		footer section
		{
			width:830px;
			background-image: url(imagenes_ie/foot.png);
		}
		


		#pergamino
			{
				background-image: url(imagenes_ie/pergamino.png);
				background-size:99% 99%;
				background-repeat:no-repeat;
				margin: auto;
				margin-top:-10px;
				overflow: hidden;
				padding-bottom:20px;
				padding-top:50px;
				position:absolute;
				width:450px;
				z-index:99999;
			}
				#bgmodal
			{

			      	position:absolute;
					overflow:hidden;
					position: fixed;
					margin-bottom:100px;
			        background-color:transparent;
					z-index:12000;
			}

					.titulo
			{
				color:#fff;
				
				font-size:40px;
				font-family: 'Caesar Dressing', cursive;
				text-align:center;
				text-shadow: rgba(0, 0, 30, 0.08) 0px 5px 2px;  
				margin-top:-35px;
				behavior: url(PIE.htc);
			}
			#secciones aside
			{
				width:32%;
			}
			</style>



	<![endif]-->



	<script type="text/javascript">
		$(function() {
		$( "#radio" ).buttonset();

		$( "input:submit").button();
		
	});


	function ajax(elemento,consulta)
	    {	

	    	var $contenidoAjax = $(elemento).html('<center><br><img src="imagenes/cargando.gif" /><br><br></center>');
			    $.ajax({
			        data: consulta,
			        type:  'post',
			        url : 'Modelos/Busqueda.php',
			        success : function (data)
			        {
			                  $contenidoAjax.html(data);
			            	  
			        }
			    });
			    
	    }
	    


	    	$(document).ready(function(){  

	    	$('#Buscar').keypress(function(event) {
		    	 
		    	  if(event.keyCode == 13){

		    	  	event.preventDefault();	
		    		var elemento=$("#ajax");


		    		ajax(elemento,"opcion=foto&foto="+$("#Buscar").val()); 
		    		} 
				});
  
			    $("#radio").click(function() {  
			        if($("#Deporte").is(':checked')) {  
			           

			           $('#file').html('<input type="text" name="archivo" placeholder="inserta el vinculo del video" required>');

			        } 
			        else
			        {
			        	$('#file').html('<input type="file" id="archivo" name="userfile" placeholder="Añade una imagen secundaria" style="text-align:center;" required >');
			        }  
			    });  
  
		});  

	
 /*
	     $(document).ready(function() 
		    {
		    	$('#registro').submit(function(event){
		    		  event.preventDefault();
		    		var elemento=$("#registro");

		    		ajax(elemento,"bool=true");  
				});
		    }
		    );
*/


	</script>
	<style>

		#radio
		{
			width: 40%;
			
		}
		 #file input
		 {
		 	margin-left: 0px;
		 }
		 #Prod
		 {
		 	width: 105%;
		 }
		 li
		 {
		 	margin-bottom: 5px;
		 }
		 #paginacion
		 {
		 	text-align: center;
		 	width: 100%;
		 	margin-top: 20px;
		 }
		 #paginacion a
		 {
		 	font-weight: bold;
		 }

	</style>

	


</head>

	<body>
	
		<section id="sucontenedor">
		<? include('header.php'); ?>

			<section id="contenedor">

				

				<section id="principal">

					<? include('headerin.php'); ?>

					<h1 class="titulo">GALERÍA<h1>
					<h2> Registra una foto nueva</h2>

					<section id="registro">
						<form action="Modelos/Registros.php?opcion=foto" method="POST" enctype="multipart/form-data" >
							<ul>
								<li id="inno"><input type="text" name="Nombre" placeholder="Nombre de la foto" required></li>
								<li id="Prod">
									<input type="text" name="Producto" list="Producto" placeholder="Elige un albúm">
									  <datalist id="Producto">
									   
									    
									<? echo $vista; ?>

								</datalist>
								</li>
								<li id="radio">
									
									<input type="radio" id="Deporte" name="Categoria" value="Videos" /><label for="Deporte">Videos</label>
									<input type="radio" id="Souvenir" name="Categoria" value="Fotos"/><label for="Souvenir">Fotos</label>
									
							
								</li>
								<li id="file" style="width:50%"><input type="file" id="archivo" name="userfile" placeholder="Añade una imagen secundaria" style="text-align:center;" required ></li>
								<li id="enviar"><input type="submit" value="Registrar" id="registro"></li>

							</ul>


						</form>



					</section>

					<div id="numeros">


							<p style="text-align:left;padding-left:15px ">
								<strong>Fotos registradas</strong>
							</p>

							
							<form>
								<input type="search" placeholder="Buscar Producto" name="buscar" id="Buscar" required>
							</form>
							


						</div>

						<div class="tabla">

							
							<ul>

								<li style="width:38%;text-align:left">Nombre</li>
								<li style="width:18%" >Producto</li>
								<li style="width:15%">Categoría</li>
								<li style="width:17%">Fecha</li>
								<li style="width:7%;border:none">X</li>

							</ul>

						</div>

					<section id="ajax">
						<?

							echo $vista1;
						 ?>
					</section>

					<div id="paginacion">

						<a href="Admin.php?opcion=galeria&inicio=<? if($anterior>5){$anterior=$inicio-5;} else{$anterior=0;} echo $anterior; ?>">Anterior </a>/<a href="Admin.php?opcion=galeria&inicio=<? echo $sig; ?>"> Siguiente</a>


					</div>


					

			</section>

		</section>
		</section>
		
		<? include('footer.php'); ?>
	</body>
</html>
