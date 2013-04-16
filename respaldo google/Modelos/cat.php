<?session_start();

				$contador=0;
				$fh=false;
				if(isset($_POST['latitud']))
					$_SESSION['latitud']=$_POST['latitud'];
				if(isset($_POST['longitud']))
					$_SESSION['longitud']=$_POST['longitud'];
				if(isset($_POST['fh']))
					$fh=$_POST['fh'];
				

				$latitud=$_SESSION['latitud'];
				$longitud=$_SESSION['longitud'];
				$opcion=$_SESSION['Id'];

			

				$date=date("Y-m-d");
				$fecha="curdate()";
			
				if(isset($_POST['fecha']))
				{
					$bandera=false;
					$date=$_POST['fecha'];
					$fecha="'".$date."'";
				}


				include '../Conexion.php';

				$conexion=new Conexion("marker","localhost","root","6374");
				



				if($fh==true)
					$sql="Select Evento.Id as Id,Evento.Ubicacion as U,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Horario,Evento.Nombre as Nom,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <20)and Horario IN(Select Id from Horario where  TIME_FORMAT( Time(curtime()) - Time('01:00:00') ,'%h:%i:%s') < Cierre) and Estado='1' and $fecha BETWEEN Fecha_inicio and Fecha_final and Evento.Tipo IN (Select Nombre From Tipo Where Categoria='$opcion')order by Fecha_inicio ASC";
				else
					$sql="Select Evento.Id as Id,Evento.Ubicacion as U,Evento.Fecha_inicio as Fi,Evento.Fecha_final as Ff,Evento.Horario,Evento.Nombre as Nom,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <20)and Horario IN(Select Id from Horario where  TIME_FORMAT( Time(curtime()) - Time('01:00:00') ,'%h:%i:%s') < Cierre) and Estado='1' and Evento.Tipo IN (Select Nombre From Tipo Where Categoria='$opcion')and (Fecha_inicio between $fecha and DATE_ADD(NOW(),INTERVAL 1 YEAR) || $fecha between Fecha_inicio and Fecha_final) order by Fecha_inicio ASC";


			// $sql="Select Evento.Id as Id,Evento.Ubicacion as U,Evento.Fecha as fecha,Evento.Horario,Evento.Nombre as Nom,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians(20.295347) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians(-102.706354) ) + sin( radians(20.295347) ) * sin( radians( latitud ) ) ) ) <2) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and Fecha ='$date' and Evento.Tipo IN (Select Nombre From Tipo Where Categoria='$opcion')";


				$eventos=$conexion->Resultado($sql);
			
				$render="";


				while($query=$eventos->fetch_assoc())
	  			{


	  				$fechai = new DateTime($query['Fi']);

					
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
	  				$descripcion=$query['Descripcion'];
					$descripcion=substr ($descripcion, 0, 90).". . .";
	  				$negocio=$conexion->Query($sql);
			
	  				$render.="<li id='".$query['Id']."' class='enlace'> <a href='Evento.php?distancia=$distancia&Id=".$query['Id']."&negocio=".utf8_encode($negocio['N'])."&inicio=$Inicio&cierre=$Cierre&latitud=$latitud&longitud=$longitud&logo=".$negocio['Logo']."'><p class='titulo' itemprop='summary'>".utf8_encode($query['Nom'])."<br><label class='fec'>$fechai / $fechaf</label></p><div class='aventos'><div class='aimagen'><center><img src='".$negocio['Logo']."'></center></div><div class='aparrafos'><p class='neg'>".$negocio['N']."</p><p class='hora' itemprop='duration'>Distancia <label class='distancia'>$distancia</label> m  &nbsp;&nbsp;&nbsp;&nbsp; Horario: $Inicio - $Cierre Hrs</p> <p class='descripcion' style='margin-top:5px;'itemprop='description'>".utf8_encode($descripcion)."</p></div></div></a> </li>";
	  				$contador++;
	  			
	  			}



	  			if($contador==0)
	  				$render="<li><p class='titulo'>No hay Eventos registrados para esta fecha</p></li>";
	  			 	
	  			echo $render;	
					
					?>