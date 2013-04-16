					<?

							 		echo "1";
							 		include '../Conexion.php';
							 		echo "2";
									$conexion=new Conexion("marker","localhost","root","6374");
									echo "3";
									$sql='SELECT Archivo,Nombre from Imagenes where Id IN(SELECT Icono from Categoria)';
									echo "4";

					?>

					<div class="logo">

							<div class="imagen">
								<img src="http://cazaeventos.com/imagenes/c2.png" >
							</div>
						
							<h1 class="nombre">
								 Próximos Eventos

							</h1>	

							<h2>Selecciona una Categoría</h2>

					 </div>

						<center>
							<table cellspacing="8" id="categorias"> 

							 	<?
									echo "5";
									$imagenes=$conexion->Resultado($sql);

									$contador=0;

								while($renglon =mysqli_fetch_row($imagenes))
								{
									if ($contador==0)
									{
									?>
										<tr>
									<?
									}

								?>
								<td><center><a href="#moldecat" data-transition="slide"><img src="http://cazaeventos.com/<? echo $renglon[0]; ?>" title="<? echo $renglon[1]; ?>" id="<? echo $renglon[1]; ?>" class="categoria"></center></a></td>
									<?
									if($contador==3)
									{
										?>
											</tr>

										<?
										$contador=0;
									}
									else
									{

									$contador++;
									}
								}

								echo "</table>";
							 	?>
							
							


						</center>
						<a href="#moldecat" data-transition="slide" style="text-decoration:none"><div id="todos"> Todas las categorías </div></a>