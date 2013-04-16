<?

				include '../Conexion.php';

				$conexion=new Conexion("marker","localhost","root","6374");
				$latitud=$_POST['latitud'];
				$longitud=$_POST['longitud'];
				$distancia=2;

				if(isset($_POST['distancia']))
					$distancia=$_POST['distancia'];
				

				$sql="Select Evento.Id,Evento.Ubicacion as U,Evento.Horario,Evento.Nombre as N,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM Ubicacion where  ( 6371 * acos( cos( radians($latitud) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians($longitud) ) + sin( radians($latitud) ) * sin( radians( latitud ) ) ) ) <$distancia) and Horario IN(Select Id from Horario where  TIME_FORMAT( Time(curtime()) - Time('01:00:00') ,'%H:%i:%s') between Inicio and Cierre || TIME_FORMAT( Time(curtime()) - Time('01:00:00') ,'%H:%i:%s')< Inicio )And Estado=1 and curdate() BETWEEN Fecha_inicio and Fecha_final Order By Evento.Tipo,Horario.Inicio";


		
				//$sql="Select Evento.Id as Id,Evento.Ubicacion as U,Evento.Horario,Evento.Nombre,Evento.Negocio,Horario.Inicio as I,Horario.Cierre as D,Evento.Descripcion as Descripcion from Evento INNER JOIN Horario on Horario.Id=Evento.Horario where  Ubicacion IN (SELECT Id  FROM ubicacion where  ( 6371 * acos( cos( radians(20.295347) ) * cos( radians( latitud ) ) * cos( radians( longitud ) - radians(-102.706354) ) + sin( radians(20.295347) ) * sin( radians( latitud ) ) ) ) <$distancia) and Horario IN(Select Id from Horario where  curtime() between Inicio and Cierre) and Fecha =curdate()";
				$eventos=$conexion->Resultado($sql);
				$bandera="";
				$render="";
				$contador=0;
				$actual=date("G:H:s");
				$actual = str_replace(":","",$actual); 
				$actual=$actual-10000;


				while($query=$eventos->fetch_assoc())
	  			{

	  				$comienzo="";
	  				$fecha = new DateTime($query['I']);
					$Inicio=$fecha->format('H:i:s');
					

					$vi=str_replace(":","",$Inicio);
				
				
					
					if($actual<=$vi)
						$comienzo=" &nbsp;&nbsp;<span style='font-size:14px'> (Por comenzar)</span>";
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



	  				$sql="Select Negocio.Nombre as N,Negocio.Logo as Logo,Tipo.Nombre as T,Categoria.Nombre as C from Negocio INNER JOIN Tipo  ON Negocio.Tipo=Tipo.Nombre INNER JOIN Categoria on Categoria.Nombre=Tipo.Categoria  where Negocio.Id='".$query['Negocio']."'";

	  				$negocio=$conexion->Query($sql);
	 
	  				if($bandera!=$negocio['C'])
	  				{
	  					$bandera=$negocio['C'];
  						
  						
  						$render.="<li class='list-divider'><center>".utf8_encode($bandera)."</center></li>";



	  				}
	  				$descripcion=$query['Descripcion'];
					$descripcion=substr ($descripcion, 0, 60).". . .";
	  				$render.="<li id='".$query['Id']."' class='enlace' > <a href='Evento.php?distancia=$distancia&Id=".$query['Id']."&inicio=$Inicio&cierre=$Cierre&latitud=$latitud&longitud=$longitud&logo=".$negocio['Logo']."&negocio=".utf8_encode($negocio['N'])."'><p class='titulo' style='font-weight:bold; box-shadow:rgba(0,0,0,0.5) 0 0 2px;'itemprop='summary'>".utf8_encode($query['N'])." $comienzo</p><div class='aventos'><div class='aimagen'><center><img src='".$negocio['Logo']."'></center></div><div class='aparrafos'><p class='lugar'itemprop='location'>".utf8_encode($negocio['N'])."</p><p class='hora' itemprop='duration'>Distancia <label class='distancia'>$distancia</label>m aprox. &nbsp;&nbsp;&nbsp;&nbsp; Horario: $Inicio - $Cierre Hrs</p> <p class='descripcion' style='margin-top:5px;'>".utf8_encode($descripcion)."</p></div></div></a> </li>";
	  				 $contador++;
	  			
	  			}

	  			
	  			if($contador==0)
	  				$render.="<li><p class='titulo'>No se encontraron Eventos</p></li>";
	  			 	
	  			echo $render;
					

				?>
