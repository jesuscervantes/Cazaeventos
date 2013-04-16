<div data-role="page" data-theme="a" id="busqueda" data-inset="false">

			<div data-role="header" data-theme="a" class="cabecera">

				<a href="index.php" data-icon="home" data-iconpos="notext" data-transition="slide">Home</a>
				<a href="#menu" data-icon="menu" data-rel="dialog"  data-iconpos="notext"  data-transition="pop">Próximos</a>
				<center><img src="http://cazaeventos.com/imagenes/letrero.png"></center>
			</div>


			<div data-role="content" data-theme="a" id="formulario" data-inset="true"  >
				

				<div class="logo">

						<div class="imagen">
							<img src="http://cazaeventos.com/imagenes/lupa.png">
						</div>
					
						<h1 class="nombre" id="cat">
							 Encontrar

						</h1>	

				    </div>
				

					<fieldset data-role="controlgroup" id="radios" >

			     		<input type="radio" name="Categoria" id="radio-choice-1" value="Nombre" checked="checked" id="Nombre"/>
			     		<label for="radio-choice-1">Por nombre del Evento</label>
			 
			     		<input type="radio" name="Categoria" id="radio-choice-2" value="Lugar"  />
			     		<label for="radio-choice-2">Por nombre del Lugar</label>

			     		<input type="radio" name="Categoria" id="radio-choice-3" value="Municipio"  />
			     		<label for="radio-choice-3">Municipio</label>

					</fieldset>

					
					<input type="search" name="Dato" id="dato" value="" placeholder="Ingresa tu búsqueda" />
					<a href="#encontrar" data-role="button" id="enviar"> Enviar</a>
					

				
				
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