<?
	include '../Conexion.php';

	$evento=$_POST['Id'];
	$distancia=$_POST['Distancia'];
	$negocio=str_replace("(Por comenzar)", "",utf8_encode($_POST['Negocio']));


	$conexion=new Conexion("marker","localhost","root","6374");
	$sql="Select * from Evento where Id =$evento";
	$datos=$conexion->Query($sql);

	$sql="Select Inicio,Cierre from Horario where id='".$datos['Horario']."'";
	$horario=$conexion->Query($sql);

	$sql="Select Nombre,Archivo from Imagenes where Id='".$datos['Imagen']."'";
	$imagen=$conexion->Query($sql);

	$sql="Select Municipio,Calle,latitud,longitud,Numero from Ubicacion where id='".$datos['Ubicacion']."'";
	
	$domicilio=$conexion->Query($sql);


?>
		<div id="contendor">
			<div id="data">

				<p id="nome" class="eventos">
					<strong><? echo utf8_encode($datos['Nombre']);?></strong>

				</p>

				<div id="foto">
							<img src="http://cazaeventos.com/<? echo $imagen['Archivo'];?>">
				</div>
			
			

				<p id="nego" >
					<strong><? echo $negocio;?></strong>

				</p>

	
					<table id="info"  cellspacing="2">
						<tr>

							<td valing="top" class="info">
								<strong>Distancia </strong>
							
								<? echo $distancia; ?> m 
							</td>
						</tr>	
						<tr>	
						    <td valing="top" class="info">
						    	<strong>Domicilio </strong>
						    

						   
						   	<? echo htmlentities($domicilio['Calle'])." #".$domicilio['Numero']." ".$domicilio['Municipio'];?>
						   </td>
						</tr>
						<tr>
							<td valing="top" class="info">
								<strong>Horario </strong> &nbsp;
							
								<? echo $horario['Inicio']." - ".$horario['Cierre']."Hrs";?>
							</td>
						</tr>		
					</table>
				
				<p class="text" id="descripcion" >


							<? echo utf8_encode($datos['Descripcion']); ?>

				</p>
				<br>
				<p id="mp"></p>
				<div id="mapa_canvas"></div>

			<div id="botones" style="overflow:hidden" data-role="controlgroup">
					<a href="#" id ="mmapa" data-role="button" >Mapa</a>
					<a href="#" id ="boton" data-role="button" >Sitio Web</a>
					<a href="#dos" id="regresar" data-rel="back" data-role="button"  data-transition="pop" data-direction="reverse">Regresar a eventos</a>
				</div>


			</div>
			


		</div>

	
<script type="text/javascript">

 longitude="<? echo $domicilio['longitud']; ?>";
 latitude="<? echo $domicilio['latitud']; ?>";

</script>
<?

/*
<p id="evento" class="eventos"><? echo $datos['Nombre'];?></p>
					<div id="foto">
						<img src="<? echo $imagen['Archivo'];?>">
					</div>


					<p class="datos">

						<strong><? echo $negocio;?></strong>
						<br>
						<br><? echo $distancia; ?> m de distancia
						<br><? echo htmlentities($domicilio['Calle'])." #".$domicilio['Numero']." ".$domicilio['Municipio'];?>
						<br><? echo $horario['Inicio']." - ".$horario['Cierre']."Hrs";?>

					</p>
				

					
					
						<p class="text" id="descripcion" style="margin-bottom:10px;margin-top:10px;text-align:center">


							<? echo $datos['Descripcion']; ?>

						</p>
				</div>
					
				<div id="mapa_canvas"></div>
				<br>
				<div id="botones" style="overflow:hidden">
					<a href="#" id ="mmapa" data-role="button" >Mapa</a>
					<a href="#" id ="boton" data-role="button" >Sitio Web</a>
					<a href="#" id ="regresar" data-role="button" >Regresar a eventos</a>
				</div>
				*/

?>
	
