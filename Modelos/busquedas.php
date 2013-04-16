<?


				include '../Conexion.php';

				$conexion=new Conexion("marker","localhost","root","6374");
				//$sql="Select Evento.Id,Evento.Ubicacion as U,Evento.Horario,Evento.Nombre,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <2) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and Fecha =curdate()";

				$dato=$_POST['dato'];
				$_POST['radio'];

				$latitud=$_POST['latitud'];
				$longitud=$_POST['longitud'];
		
				switch ($_POST['radio']) {


					case "Nombre":

					$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where Nombre LIKE '%".$dato."%' and Estado='1' and curdate() BETWEEN Fecha_inicio and Fecha_final";

					break;

					case "Lugar":

					$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where Negocio IN(Select Id from Negocio where Nombre LIKE '%".$dato."%')and Estado='1' and curdate() BETWEEN Fecha_inicio and Fecha_final";

					break;

					case "Municipio":

					$sql="SELECT Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where Ubicacion IN(Select Id from Ubicacion where Municipio LIKE '%".$dato."%')and Estado='1' and curdate() BETWEEN Fecha_inicio and Fecha_final";

					break;




				}
				$eventos=$conexion->Resultado($sql);
				$bandera="";
				$render.='<ul id="eventos">';

			
					

				
				while($query=$eventos->fetch_assoc())
	  			{


	  				$fecha = new DateTime($query['I']);
					$Inicio=$fecha->format('H:i');
					$fecha = new DateTime($query['D']);
					$Cierre=$fecha->format('H:i');
					$fechai=$query['Fi'];
					$fechaf=$query['Ff'];

					/*$sql="SELECT ( 6371 * acos( cos( radians(20.295347) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians(-102.706354) ) + sin( radians(20.295347) ) * sin( radians( latitud ) ) ) ) as Distancia  FROM ubicacion where Id='".$query['U']."'";
					$distancia=$conexion->Query($sql);
					$distancia=$distancia['Distancia'];
					$distancia= round(($distancia*1000),2);
					*/

					$sql="call distancia($latitud,$longitud,".$query['U'].",@distancia)";
					$distancia=$conexion->Resultado($sql);
					$distancia=$conexion->Query("SELECT Round(@distancia,2) as distancia");
					$distancia=$distancia['distancia'];
	  				$sql="Select Negocio.Nombre as N,Negocio.Logo as Logo,Tipo.Nombre as T,Categoria.Nombre as C from Negocio INNER JOIN Tipo  ON Negocio.Tipo=Tipo.Nombre INNER JOIN Categoria on Categoria.Nombre=Tipo.Categoria  where Negocio.Id='".$query['Negocio']."'";
	  				$negocio=$conexion->Query($sql);
					$descripcion=$query['Descripcion'];
					$descripcion=substr ($descripcion, 0, 90).". . .";
	  				$render.="<li id='".$query['Id']."' class='enlace'> <a href='Evento.php?distancia=$distancia&Id=".$query['Id']."&negocio=".utf8_encode($negocio['N'])."&inicio=$Inicio&cierre=$Cierre&latitud=$latitud&longitud=$longitud&logo=".$negocio['Logo']."'><p class='titulo'>".utf8_encode($query['N'])."<br><label class='fec'>$fechai / $fechaf</label></p><div class='aventos'><div class='aimagen'><center><img src='".$negocio['Logo']."'></center></div><div class='aparrafos'><p class='neg'>".$negocio['N']."</p><p class='hora'>Distancia <label class='distancia'>$distancia</label>m aprox.  &nbsp;&nbsp;&nbsp;&nbsp; Horario: $Inicio - $Cierre Hrs</p> <p class='hora' style='margin-top:5px;'>".utf8_encode($descripcion)."</p></div></div></a> </li>";
	  				$contador++;
	  			
	  			}

	  			$render.='</ul>';

	  			if($contador==0)
	  				$render.="<li><p class='titulo'>No se encontraron Eventos</p></li>";
	  		

	  			echo $render;
					

				?>


