var localizar=new Localizacion();
$(document).on("ready",geo);
	function geo()
	{


        
		var elemento=$('#estado');
        var mapa=new mapaDirection();
        mapa.iniciar();

        if(sessionStorage.getItem("direccion"))
        {
            localizar.asignarVariables();       
            localizar.mostrarDireccion();
        }
            

        else
            confirmar("mostrar");


        //evento para los enlaces de geolocalizacion
        $(".enlace").live('click',function(){
            var elemento=$("#ajaxmolde");
            var bandera=false;
            cargar($(this),elemento,bandera);
        });


        //evento para los enlaces de proximos
        $(".enlacep").live('click',function(){
            var elemento=$("#ajaxmolde");
            var bandera=$('#regresar');
            cargar($(this),elemento,bandera);

        });

         $( "#barra" ).slider(
        {
                value:2,
                min: 0,
                max: 20,
                step: 1,
                slide: function( event, ui ) 
                {
                    $( "#amount" ).val(ui.value+" Km" );
                }
        });

        $( "#amount" ).val( $( "#barra" ).slider( "value" )+" Km" );
        $( "#amount" ).css({color:"#fff",fontSize:"20px",fontWeight:"normal"});
        $("#barra").css({borderColor:"#43bcfa"});
        var elemento=$('#eventos');
        
        $( "#barra" ).slider(
        {
            change: function( event, ui ) {
                if(!localizar.actualizar(elemento,ui.value))
                    confirmar("mostrar");

            }
        });
		  

	}

	