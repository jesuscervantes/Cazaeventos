<?

			include 'Conexion.php';

			$conexion=new Conexion("marker","localhost","root","6374");
			$distancia=$_GET['distancia'];
			$id=$_GET['Id'];
			$negocio=$_GET['negocio'];
		 	$horario[0]=$_GET['inicio'];
			$horario[1]=$_GET['cierre'];
			$coordenada[0]=$_GET['latitud'];
			$coordenada[1]=$_GET['longitud'];
			$logo=$_GET['logo'];

			


			$sql="Select * from Evento where Id=$id";
			$eventos=$conexion->Query($sql);

			$sql="Select Archivo from Imagenes where Id='".$eventos['Imagen']."'";
			$imagen=$conexion->Query($sql);
			$imagen=$imagen['Archivo'];
			$sql="SELECT * from Ubicacion Where Id='".$eventos['Ubicacion']."'";
			$coordenada1=$conexion->Query($sql);


		?>