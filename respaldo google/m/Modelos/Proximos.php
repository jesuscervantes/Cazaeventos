<?

				include '../Conexion.php';

				$conexion=new Conexion("marker","localhost","root","6374");
				$latitud=$_POST['latitud'];
				$longitud=$_POST['longitud'];

				//$sql="Select Evento.Id,Evento.Ubicacion as U,Evento.Horario,Evento.Nombre,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <2) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and Fecha =curdate()";
				

				if(isset($_POST['fecha']))
				{
						$fecha=$_POST['fecha'];
						switch ($_POST['categoria'])
					{

						case 'Todas':

							$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <20) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and '$fecha' BETWEEN Fecha_inicio and Fecha_final order by Fecha_inicio ASC LIMIT 0,10";
					

						break; 

						default:
							$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <20) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and '$fecha' BETWEEN Fecha_inicio and Fecha_final and Tipo IN(Select Nombre from Tipo where Categoria='".$_POST['categoria']."') order by Id ASC LIMIT 0,10";
						break;
					}

				}
				

				
				else
				{


					switch ($_POST['categoria'])
					{
						case 'Todas':
							$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <20) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and Fecha_final between curdate() and DATE_ADD(NOW(),INTERVAL 1 YEAR) order by Fecha_inicio ASC LIMIT 0,10";
							break;
						
						default:
							$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Horario,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <20) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and Fecha_inicio between curdate() and DATE_ADD(NOW(),INTERVAL 1 YEAR) and Tipo IN(Select Nombre from Tipo where Categoria='".$_POST['categoria']."') order by Fecha_final ASC LIMIT 0,10";

							break;
					}

				}
				
					
				$sql;
				$eventos=$conexion->Resultado($sql);
				$bandera="";
				$render="";


				while($query=$eventos->fetch_assoc())
	  			{


	  				$fecha = new DateTime($query['I']);
					$Inicio=$fecha->format('H:i');
					$fecha = new DateTime($query['D']);
					$Cierre=$fecha->format('H:i');

					/*$sql="SELECT ( 6371 * acos( cos( radians(20.295347) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians(-102.706354) ) + sin( radians(20.295347) ) * sin( radians( latitud ) ) ) ) as Distancia  FROM ubicacion where Id='".$query['U']."'";
					$distancia=$conexion->Query($sql);
					$distancia=$distancia['Distancia'];
					$distancia= round(($distancia*1000),2);
					*/

					$sql="call distancia($latitud,$longitud,".$query['U'].",@distancia)";
					$distancia=$conexion->Resultado($sql);
					$distancia=$conexion->Query("SELECT Round(@distancia,2) as distancia");
					$distancia=$distancia['distancia'];



	  				$sql="Select Negocio.Nombre as N,Tipo.Nombre as T,Categoria.Nombre as C from Negocio INNER JOIN Tipo  ON Negocio.Tipo=Tipo.Nombre INNER JOIN Categoria on Categoria.Nombre=Tipo.Categoria  where Negocio.Id='".$query['Negocio']."'";

	  				$negocio=$conexion->Query($sql);
	 
	  				
  						
  						
  						$render.="<li data-role='list-divider'><center>".$query['F']."<img src='http://cazaeventos.com/imagenes/iconcal.png' width='30' class='cal'><br>".$query['Fi']." / ".$query['Ff']."</center></li>";



	  			
	  				$render.="<li id='".$query['Id']."' class='enlacep'> <a href='#molde'><p class='titulo'>".utf8_encode($negocio['N'])."</p><p class='hora'>Distancia <label class='distancia'>$distancia</label> m  &nbsp;&nbsp;&nbsp;&nbsp; $Inicio - $Cierre Hrs</p> <p class='hora' style='margin-top:5px;'>".utf8_encode($query['Descripcion'])."</p></a> </li>";
	  				 
	  			
	  			}

	  			echo $render;
					

				?>
