<?

				include '../Conexion.php';

				$conexion=new Conexion("marker","localhost","root","6374");
				//$sql="Select Evento.Id,Evento.Ubicacion as U,Evento.Horario,Evento.Nombre,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <2) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and Fecha =curdate()";

				$dato=$_POST['dato'];
				$_POST['radio'];
		
				switch ($_POST['radio']) {


					case "Nombre":

					$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where Nombre LIKE '%".$dato."%' and Evento='1' and curdate() BETWEEN Fecha_inicio and Fecha_final";

					break;

					case "Lugar":

					$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where Negocio IN(Select Id from Negocio where Nombre LIKE '%".$dato."%')and Evento='1' and curdate() BETWEEN Fecha_inicio and Fecha_final";

					break;

					case "Municipio":

					$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where Ubicacion IN(Select Id from Ubicacion where Municipio LIKE '%".$dato."%')and Evento='1' and curdate() BETWEEN Fecha_inicio and Fecha_final";

					break;

					






				}

			
		
			

				$eventos=$conexion->Resultado($sql);
				$bandera="";
				$render="<p id='res'>Resultados de la Búsqueda</p>";
				$render.='<ul data-role="listview" data-theme="a" data-inset="true"data-divider-theme="a" id="eventos">';

			
					


				while($query=$eventos->fetch_assoc())
	  			{


	  				$fecha = new DateTime($query['I']);
					$Inicio=$fecha->format('H:i');
					$fecha = new DateTime($query['D']);
					$Cierre=$fecha->format('H:i');

					$sql="SELECT ( 6371 * acos( cos( radians(20.295347) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians(-102.706354) ) + sin( radians(20.295347) ) * sin( radians( latitud ) ) ) ) as Distancia  FROM Ubicacion where Id='".$query['U']."'";
					$distancia=$conexion->Query($sql);
					$distancia=$distancia['Distancia'];
					$distancia= round(($distancia*1000),2);
					




	  				$sql="Select Negocio.Nombre as N,Tipo.Nombre as T,Categoria.Nombre as C from Negocio INNER JOIN Tipo  ON Negocio.Tipo=Tipo.Nombre INNER JOIN Categoria on Categoria.Nombre=Tipo.Categoria  where Negocio.Id='".$query['Negocio']."'";

	  				$negocio=$conexion->Query($sql);
	 
	  				
  						
  						
  						$render.="<li data-role='list-divider'><center><span style='font-size:18px'>".utf8_encode($query['N'])."</span><img src='http://cazaeventos.com/imagenes/iconcal.png' width='30' class='cal'><br><span style='font-size:12px;'>".$query['Fi']." / ".$query['Ff']."</span></center></li>";



	  			
	  				$render.="<li id='".$query['Id']."' class='enlacep'> <a href='#molde'><p class='titulo'>".utf8_encode($negocio['N'])."</p><p class='hora'><p class='hora'>Distancia <label class='distancia'>$distancia</label> m  &nbsp;&nbsp;&nbsp;&nbsp; $Inicio - $Cierre Hrs</p> <p class='hora' style='margin-top:5px;'>".utf8_encode($query['Descripcion'])."</p></a> </li>";
	  				 
	  			
	  			}

	  			$render.='</ul>';

	  			echo $render;
					

				?>
