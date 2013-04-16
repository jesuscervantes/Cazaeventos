<?
$destinatario = "contacto@restaurantluminarias.com.mx";
$destinatario1 = "jesuscervantes82@hotmail.com";
$asunto = "Comentario";
$mensaje="nombre:".$_POST['nombre']."<br>e-mail: ".$_POST['mail']."<br>Tel&eacute;fono: ".$_POST['telefono']."<br>mensaje:".$_POST['mensaje'];
//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From:".$_POST['nombre']."<".$_POST['mail'].">\r\n";

//dirección de respuesta
$headers .= "Reply-To: ".$_POST['mail']."\r\n";

//mensaje desde origen a destino
$headers .= "Return-path: ".$_POST['mail']."\r\n";

if(@mail($destinatario, $asunto, $mensaje, $headers))


{
	@mail($destinatario1, $asunto, $mensaje, $headers);
echo'<center><img src="imagenes/bien.png"><p style="color:#fff;font-size:25px">Tu comentario se envi&oacute; correctamente, agradecemos todos tus comentarios.</p></center>';


}
else{
	
	echo '<center><img src="imagenes/error.png"><p style="color:#fff;font-size:25px">No fue posible enviar tu comentario, int&eacute;ntalo mas tarde.</p></center>';
	}
?>
		
