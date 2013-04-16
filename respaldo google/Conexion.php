<?
class Conexion
 {
 	var $conexion;

 	public function __construct($db,$host,$user,$pass)

 	{

 		//$this->conexion=new mysqli($host,$user,$pass)or die('Hubo un error'.mysql_error());
 		$this->conexion=new mysqli("localhost","cazaeven","Na182uMe7w")or die('Hubo un error'.mysql_error());
		$this->conexion->query("use cazaeven_marker");
 	}

 	public function Query($consulta)

 	{


 		try
 		{
			$query=$this->conexion->query($consulta);
			$des= mysqli_fetch_array($query)or die($consulta);

			return $des;
 		}
 		catch(Exception $e)
 		{
 			echo $e;
 			return false;
 		}
 		

 	}

 	public function Resultado($consulta)
	{

		$query=$this->conexion->query($consulta)or die('no'.mysqli_error().$consulta);


		return $query;
	}

		public function tabla($consulta)
	{

		$query=$this->conexion->query($consulta)or die('no'.mysqli_error().$consulta);

		return $query;
	}





 }


?>