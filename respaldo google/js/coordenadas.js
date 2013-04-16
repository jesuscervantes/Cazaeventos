	$(document).ready(function()
	{
		$(".seccion").on("click",function(event){
				event.preventDefault();
				var elemento=$('#estado');
		        if(sessionStorage.getItem("longitud"))
		        {
		           var latitud=sessionStorage.getItem("latitud");
				   var longitud=sessionStorage.getItem("longitud");
	  		 	}
		        else
		        {
		  			localizacion(elemento,coordenadas,"categoria");
					var latitud=sessionStorage.getItem("latitud");
					var longitud=sessionStorage.getItem("longitud");
	  			}
				var id=$(this).attr("id");
				var imagen=$(this).attr("name");
				location.href="Eventos.php?id="+id+"&imagen="+imagen+"&latitud="+latitud+"&longitud="+longitud;



			});
		
		
	});