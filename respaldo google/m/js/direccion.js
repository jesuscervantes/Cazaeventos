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

  function updatemapa()
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