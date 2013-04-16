  $(function() 
      {
          $("#dialog-direction" ).dialog(
          {
              height: 225,
              autoOpen:false,
              modal: true,
              width:450,
              resizable:false,
              show: "Clip",
              hide: "explode",
              position: { my: "top", at: "top", of: window }
          });
       
           $("#open-ubication").live("click",function() {
             $("#dialog-direction" ).dialog( "open" );
             
                return false;
            });

           $("#form-direction").submit(
            function(e)
            {
              e.preventDefault();
              $("#dialog-direction" ).dialog(
              {
                  height: 475
              });
              $("#mapa-direction").css("height","200px");
              $("#direction-buttom").css("display","block");
             $("#direction-buttom").live("click",function() {
             $("#dialog-direction" ).dialog( "close" );
             
                return false;
              });

              mapa();
              codeAddress() 
              
            }

            );



       });

  function codeAddress() 
  {
         
        //obtengo la direccion del formulario
        var address = document.getElementById("text-ubication").value;
            
            geocoder.geocode( { 'address': address}, function(results, status) {
         
     
        if (status == google.maps.GeocoderStatus.OK) {
           
            map.setCenter(results[0].geometry.location);

            marker.setPosition(results[0].geometry.location);
          
            updatePosition(results[0].geometry.location);
             
         
            google.maps.event.addListener(marker, 'dragend', function(){
                updatePosition(marker.getPosition());
            });
      } else {
          //si no es OK devuelvo error
          alert("No podemos encontrar la direcci&oacute;n, error: " + status);
      }
    });
  }

  function mapa()
  {
     geocoder = new google.maps.Geocoder();
        var latitud=sessionStorage.getItem("latitud");
      var longitud=sessionStorage.getItem("longitud");
  
       if(latitud !='' && longitud != '')
      {
         var latLng = new google.maps.LatLng(latitud,longitud);

      }
      else
      {
          var latLng = new google.maps.LatLng(37.0625,-95.677068);
      }
       var myOptions = {
          center: latLng,//centro del mapa
          zoom: 15,//zoom del mapa
          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
        };
        map = new google.maps.Map(document.getElementById("mapa-direction"), myOptions);
         
         marker = new google.maps.Marker({
            map: map,//el mapa creado en el paso anterior
            position: latLng,//objeto con latitud y longitud
            draggable: true, //que el marcador se pueda arrastrar
            icon: 'imagenes/posicion.png',
            animation: google.maps.Animation.BOUNCE
        });
        
          
      }
      function updatePosition(latLng)
      {
       
      
        sessionStorage.setItem("latitud",latLng.lat());
        sessionStorage.setItem("longitud",latLng.lng());
        sessionStorage.setItem("precision",100);
        var latLng = new google.maps.LatLng(latLng.lat(),latLng.lng());
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'latLng': latLng },processGeocoder);
      }