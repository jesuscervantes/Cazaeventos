<div data-role="page" data-theme="a" id="encontrar" data-inset="false">
			<script>
			var dato = "<?php echo $_POST['Categoria']; ?>" ;
			var radio="<?php echo $_POST['Dato']?>";
			</script>

			<div data-role="header" data-theme="a" class="cabecera">

				<a href="index.php" data-icon="home" data-iconpos="notext" data-transition="slide">Home</a>
				<a href="#menu" data-icon="menu" data-rel="dialog"  data-iconpos="notext"  data-transition="pop">Próximos</a>
				<center><img src="http://cazaeventos.com/imagenes/letrero.png"></center>
			</div>


			<div data-role="content" data-theme="a" id="resultado" data-inset="true"  >
				



			</div>

			<div data-role="footer" data-theme="a" id="pie">
				<p>Sitio Completo</p>
				<p style="text-align:right">Registrarse</p>
				<center>
					<img src="http://cazaeventos.com/imagenes/nube.png">
					<a href="http://mindoncloud.com.mx/"><p style="width:100%;margin-top:0px;">Mind On Cloud</p></a>
				</center>


			</div>


		</div>
