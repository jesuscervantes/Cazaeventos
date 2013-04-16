
    function confirmar(opcion,callback) 
    {
        $( "#dialog-confirm" ).dialog(
        {
            resizable: false,
            height:230,
            width:500,
            modal: true,
            buttons: 
            {
                "Compartir ubicación": function()
                {
                    var elemento=$('#estado');
                    localizacion(elemento,coordenadas,opcion);
                    if (typeof callback == 'function')
                    {
                            callback.call();
                    }
                    $( this ).dialog( "close" );
                },
                Cancelar: function()
                {
                    $( this ).dialog( "close" );
                    $("#estado").html("<span id='open-confirm' class='precision'>Dinos donde estas</span>");

                    $("#open-confirm").live("click",function() 
                    {
                     $("#dialog-confirm" ).dialog( "open" );
                     
                        return false;
                    });

                }
            },
            position: { my: "top", at: "top", of: window }
        });
    }
    
    