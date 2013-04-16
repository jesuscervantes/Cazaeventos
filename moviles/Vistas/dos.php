		<div data-role="page" data-theme="a" id="dos" data-inset="false">


			<div data-role="header" data-theme="a" class="cabecera">

				<a href="index.php" data-icon="home" data-iconpos="notext" data-transition="slide">Home</a>
				<a href="#menu" data-icon="menu" data-rel="dialog"  data-iconpos="notext"  data-transition="pop">Próximos</a>
				<center><img src="http://cazaeventos.com/imagenes/letrero.png"></center>
			</div>





			<div data-role="content" data-theme="a" id="segunda">
			
				<center>

					<div class="ubicacion" id="image-position">
						<img src="http://cazaeventos.com/imagenes/mo2.png" id="mono">
					</div>

					<div class="ubicacion" id="dom">
						<p id="estado">Mi Ubicacion</p>
					</div>

				</center>

				<label for="slider-step">Distancia en Km</label>
				<input type="range"  name="slider-step" id="slider-step" value="2" min="0" max="20" step="1" highlight="true" />


				<p class="eventos" id="le">Eventos Cercanos</p>
				<div id="dt">

					<ul data-role="listview" data-theme="a" data-inset="true"data-divider-theme="a" id="eventos">

					</Ul>
					
				</div>


				
				
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