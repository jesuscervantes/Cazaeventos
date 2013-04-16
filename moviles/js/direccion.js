 
function Direccion()
{

  var domicilio;
  var latitud;
  var longitud;
  var contador=0;
  var map;
  var bandera=true;
  var size = new OpenLayers.Size(35,40);
  var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
  var myicon = new OpenLayers.Icon('imagenes/posicion.png', size, offset);
  this.iniciar=function()
  {

    fromProjection = new OpenLayers.Projection("EPSG:4326");   
    toProjection   = new OpenLayers.Projection("EPSG:900913");
    markers = new OpenLayers.Layer.Markers( "Markers" );
    $("#form-direction").submit(
              function(e)
              {

                e.preventDefault();
                $("#mapa-direction").css("height","200px");
                $("#direction-buttom").css("display","block");
                 domicilio = document.getElementById("text-ubication").value;
                 
                 if(bandera==true)
                 {
                  Domicilio(domicilio,mapa);
                  bandera=false;
                 }
                 else
                 {
                   Domicilio(domicilio,updateMapa);
                 }
                 
                // updatemapa();
                // codeAddress();

            });

  }

  function Domicilio(dom,metodo)
  {

     var address = document.getElementById("text-ubication").value;
      geoCodeURL = "http://nominatim.openstreetmap.org/search?format=json&q="+dom;
     $.getJSON(geoCodeURL,
      function(data) 
      {
      
       $.map( data, function( item ){
                     domicilo= item.display_name;
                     latitud=item.lat;
                     longitud=item.lon;

                    sessionStorage.setItem("latitud",latitud);
                    sessionStorage.setItem("longitud",longitud);
                    sessionStorage.setItem("precision",100);
                     
                  }); 
       metodo();
      localizarObject.asignarVariables();
      localizarObject.direction();
      });
  }


  this.obtenerDomicilio=function(domicilio,metodo)
  {
    return Domicilio(domicilio,metodo);
  }


  function updateMapa()
  {
        sessionStorage.setItem("latitud",latitud);
        sessionStorage.setItem("longitud",longitud);

        sessionStorage.setItem("precision",100);

        position= new OpenLayers.LonLat(longitud,latitud).transform( fromProjection, toProjection);
        markers.clearMarkers();
     
        markers.addMarker(new OpenLayers.Marker(position));             
        map.setCenter(position,17);
      
  }

  function mapa()
  {
   
     var zoom= 15;
          position = new OpenLayers.LonLat(longitud,latitud).transform( fromProjection, toProjection);
          map = new OpenLayers.Map("mapa-direction");
          var mapnik  = new OpenLayers.Layer.OSM();
          map.addLayer(mapnik);
           var pointLayer = new OpenLayers.Layer.Vector("Point Layer");
          map.addLayer(markers);
          markers.addMarker(new OpenLayers.Marker(position,myicon));
          map.setCenter(position, zoom);
          map.events.register("click", map, mouseMoveHandler);
          
          function mouseMoveHandler(e) 
          {
         
            console.log(e.xy);
            
            var lonlat = map.getLonLatFromPixel(e.xy);
            lonlat=lonlat.transform(toProjection,fromProjection);
            latitud=lonlat.lat;
            longitud=lonlat.lon;
            
            updateMapa();
           localizarObject.asignarVariables();
            localizarObject.direction();
            // updatePosition(,);

          }
  }


  this.destruir=function()
  {

    map.destroy();
    bandera=true;
  }




}



  