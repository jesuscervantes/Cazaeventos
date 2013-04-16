<hr id="linea">
<script src="js/jquery-ui-1.9.1.custom.js"></script>
<link rel="stylesheet" href="css/start/jquery-ui-1.9.1.custom.css"/>

<script type="text/javascript">
$(function() {
	/*var width = $(window).width();
    if(width<=635)
    {

        location.href='http://m.cazaeventos.com/';
    
}*/
        $("#prox").dialog({
            height: 160,
            autoOpen:false,
            modal: true,
            width:395,
            resizable:false,
            show: "Clip",
            hide: "explode"
        });

        $(".ingresar").click(function() {
        	$("#prox").dialog( "open" );
        });
         });

</script>



	<div id="prox" title="Ingresa a tu panel">
		<p>Próximamente</p>
	</div>
		<header>

			

			<nav class="ultimo">

				<ul>
					<a href="inicio" title="INICIO">
						<li id="inicio">
							<img src="home.png">
							<p>INICIO</p>
						</li>
					</a>
					
					<li class="ingresar" title="INGRESAR">
						<img src="9.png">
						<p>INGRESAR</p>


					<a href="Contacto" title="CONTACTO">
						</li>
						<li class="ultimo">

							<img src="globo.png" id="con">
							<p>CONT&Aacute;CTO</p>


						</li>
					</a>	

				</ul>
			</nav>


			<div id="fb-root">
				<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcazaeventos.com&amp;send=false&amp;layout=button_count&amp;width=200&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=tahoma&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:21px;" allowTransparency="true"></iframe>
			</div>
			<div id="gplus">

				<!-- Inserta esta etiqueta donde quieras que aparezca Botón +1. -->
				<div class="g-plusone" data-size="tall" data-annotation="inline" data-width="130" data-href="http://cazaeventos.com/"></div>

				<!-- Inserta esta etiqueta después de la última etiqueta de Botón +1. -->
				<script type="text/javascript">
				  window.___gcfg = {lang: 'es'};

				  (function() {
				    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				    po.src = 'https://apis.google.com/js/plusone.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			</div>



		</header>