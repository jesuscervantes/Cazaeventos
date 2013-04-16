
		$(document).on("ready",function() 
		{
			$("#contacto").submit(function(event)
			{
				event.preventDefault();
				var elemento=$(".azquierda");

				var json=
						{
							Nombre: $("#nombre").val(),
							mail: $("#mail").val(),
							comentario: $("#comentario").val()
						};

				send='nombre='+json.Nombre+'&mail='+json.mail+'&comentario='+json.comentario;
			
				ajax(elemento,send,"Modelos/correo.php");

			});
		})
