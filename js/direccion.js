 

function mapaDirection()
{
    var bandera=true;
      var size = new OpenLayers.Size(35,40);
      var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
      var myicon = new OpenLayers.Icon('imagenes/posicion.png', size, offset);

    this.iniciar=function()
    {
          fromProjection = new OpenLayers.Projection("EPSG:4326");   
          toProjection   = new OpenLayers.Projection("EPSG:900913");
          markers = new OpenLayers.Layer.Markers( "Markers" );
       $("#dialog-direction" ).dialog(
            {
                height: 475,
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
                    if(bandera==true)
                    {
                      OSM();
                      direccion();
                      bandera=false;
                    }

                    $("#direction-buttom").css("display","block");
                    $("#direction-buttom").live("click",function(){
                        $("#dialog-direction" ).dialog( "close" );
                       
                        return false;
                    });       
                  return false;
              });
    };
      
      function direccion()
      {
          $("#text-ubication").autocomplete({
           source: function(request,response)
           {
               geoCodeURL = "http://nominatim.openstreetmap.org/search?format=json&q="+request.term;
               $.getJSON(geoCodeURL,
                function(data) 
                {
                 response($.map( data, function( item ){
                               
                               return  {
                                  label: item.display_name,
                                  value: item.display_name,
                                  lat: item.lat,
                                  lon: item.lon,

                              }
                            })); 
                });
           },
            minLength: 2,
            maxLength:5,
            delay: 0,
            select: function ( event, ui ) {

               updatePosition(ui.item.lat,ui.item.lon);
     
            }
      
       });
      }

       function updatePosition(lat,lon)
      {
        sessionStorage.setItem("latitud",lat);
        sessionStorage.setItem("longitud",lon);

        sessionStorage.setItem("precision",100);
        console.log(lon+","+lat);
        position= new OpenLayers.LonLat(lon,lat).transform( fromProjection, toProjection);
        markers.clearMarkers();
     
        markers.addMarker(new OpenLayers.Marker(position,myicon));             
        map.setCenter(position,17);
        localizar.asignarVariables();
        localizar.direction();
      
      }


       function OSM() 
        {
          var zoom= 15;
          position = new OpenLayers.LonLat( sessionStorage.getItem("longitud"), sessionStorage.getItem("latitud")).transform( fromProjection, toProjection);
          map = new OpenLayers.Map("mapa-direction");
          var mapnik  = new OpenLayers.Layer.OSM();
          map.addLayer(mapnik);
           var pointLayer = new OpenLayers.Layer.Vector("Point Layer");
          map.addLayer(markers);
          markers.addMarker(new OpenLayers.Marker(position,myicon));
          map.setCenter(position, zoom);
    //       map.addControl(new OpenLayers.Control.LayerSwitcher());
    //       map.addControl(new OpenLayers.Control.MousePosition({
    //         prefix: '<p style="margin-top:0;color:#000"><a target="_blank" ' +
    //     'href="http://spatialreference.org/ref/epsg/900913/">' +
    //     'EPSG:4326</a> coordinates: '
    // }));

          map.events.register("click", map, mouseMoveHandler);
          
          function mouseMoveHandler(e) 
          {
         
            console.log(e.xy);
            
            var lonlat = map.getLonLatFromPixel(e.xy);
            lonlat=lonlat.transform(toProjection,fromProjection);
           
            updatePosition(lonlat.lat,lonlat.lon);

          }

         
      }



}



