$(document).on("ready",geo);
	function geo()
	{
		var elemento=$('#estado');
        if(sessionStorage.getItem("longitud"))
            mostrar();

        else
            confirmar("mostrar");
		  

	}

	$(function() 
    {
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
    		change: function( event, ui ) {actualizar(elemento,mostrar,ui.value);}
        });
    });