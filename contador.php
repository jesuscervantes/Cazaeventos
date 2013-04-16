
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8"/>
	<title>CazaEventos</title>

	<link href='http://fonts.googleapis.com/css?family=Duru+Sans|Baumans' rel='stylesheet' type='text/css'>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">


  	<meta name="author" content="powered by eljebus">
	<meta name="description" content="Encuentra los eventos más destacados que se llevan a cabo cerca de ti"> 
	<META NAME="keywords" CONTENT="Eventos,Jamay,jamay,eventos,Ribera de Chapala,Chapala,Ocotlan,La Barca,Geolocalización,Geolocalizacion,GPS,mapas">
	<link rel="shortcut icon" href="imagenes/icono.png"type="image/x-icon" />
	<META HTTP-EQUIV="Pragma" CONTENT="no- cache"> 

	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="pie.css" />
	<link rel="stylesheet" href="css/index.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/regresiva.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    var fecha;
function faltan()
{
  var today = new Date();
fechaFinal = new Date(2013,0,11,19,0,0);
fechaActual = new Date();
diferencia = new Date(fechaFinal - fechaActual);
diferenciaSegundos = diferencia /1000;
diferenciaMinutos = diferenciaSegundos/60;
diferenciaHoras = diferenciaMinutos/60;
diferenciaDias = diferenciaHoras/24;
diferenciaHoras2 = parseInt(diferenciaHoras) - (parseInt(diferenciaDias) *24)
diferenciaMinutos2 = parseInt(diferenciaMinutos) - (parseInt(diferenciaHoras) * 60)
diferenciaSegundos2 = parseInt(diferenciaSegundos) - (parseInt(diferenciaMinutos) * 60)
diferenciaDias = parseInt(diferenciaDias)
if (diferenciaDias < 10 && diferenciaDias > -1){diferenciaDias = "0" + diferenciaDias}
if(diferenciaHoras2 < 10 && diferenciaHoras2 > -1){diferenciaHoras2 = "0" + diferenciaHoras2}
if(diferenciaMinutos2 < 10 && diferenciaMinutos2 > -1){diferenciaMinutos2 = "0" + diferenciaMinutos2}
if(diferenciaSegundos2 < 10 && diferenciaSegundos2 > -1){diferenciaSegundos2 = "0" + diferenciaSegundos2}
if(diferenciaDias <= 0 && diferenciaHoras2<= 0 && diferenciaMinutos2 <= 0 && diferenciaSegundos2 <= 0)
  {
  diferenciaDias = 0
  diferenciaHoras2 = 0
  diferenciaMinutos2 = 0
  diferenciaSegundos2 = 0

   }
 fecha=diferenciaDias+":"+diferenciaHoras2+":"+diferenciaMinutos2+":"+diferenciaSegundos2;

        $('#counter').countdown({
          image: 'img/digits.png',
          startTime: fecha
        });

        
}
       $(function(){
        faltan();
       });
        

        
     
    </script>
    <style type="text/css">
      br { clear: both; }
      .cntSeparator {
        font-size: 54px;
        margin: 10px 7px;
        color: #000;
      }
      .desc { margin: 7px 3px; }
      .desc div {
        float: left;
        font-family: Arial;
        width: 70px;
        margin-right: 65px;
        font-size: 13px;
        font-weight: bold;
        color: #000;
      }
      #counter
      {
      	margin: auto;
      	border:dashed 1px;
      	text-align: center;
      	width:495px;
      	overflow: hidden;

      }
      #reloj,#datos
      {
        width: 495px;
        overflow: hidden;
        padding: 10px;
        margin: auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #000;
        font-size: 0;
      }

      #datos
      {
        background: transparent;
        padding: 0;
        box-shadow: none;
        color:#fff;
        margin-bottom: 10px;
      }
      .datos
      {
        font-size: 16px;
        color: #FFF;
        font-weight: bold;
        text-align: center;
        width: 25%;
        display: inline-block;
      }
    </style>
  </head>
<body>
  
<section class="contenedor">

			<? include 'Vistas/logo.php';?>

				<P><h1 class="luz"  itemprop="name" STYLE='text-align:center;width:800px;'>VIERNES 11 DE ENERO</h1></P>
	
				
	
	     <div id="datos">
         <div class="datos">Dias</div>
           <div class="datos">Horas</div>
           <div class="datos">Minutos</div>
           <div class="datos">Segundos</div> 
       </div>
				<div id="reloj">
           <div id="counter"></div>
        </div>
        



		

		</section>

  
</body>
</html>
