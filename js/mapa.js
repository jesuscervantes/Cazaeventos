function mapa(latitud,longitud,latitudee,longitudee)
		 {
		 	fromProjection = new OpenLayers.Projection("EPSG:4326");   
          toProjection   = new OpenLayers.Projection("EPSG:900913");
          markers = new OpenLayers.Layer.Markers( "Markers" );
        	var size = new OpenLayers.Size(35,40);
			var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
			var icon = new OpenLayers.Icon('imagenes/radar.png', size, offset);
			var myicon = new OpenLayers.Icon('imagenes/posicion.png', size, offset);
		 	
		 	var zoom= 15;
          myPosition = new OpenLayers.LonLat( longitud,latitud).transform( fromProjection, toProjection);

          eventPosition = new OpenLayers.LonLat( longitudee,latitudee).transform( fromProjection, toProjection);

          map = new OpenLayers.Map("canvas");
          var mapnik  = new OpenLayers.Layer.OSM();
          map.addLayer(mapnik);
           var pointLayer = new OpenLayers.Layer.Vector("Point Layer");
          map.addLayer(markers);
          markers.addMarker(new OpenLayers.Marker(myPosition,myicon));
           markers.addMarker(new OpenLayers.Marker(eventPosition,icon));
          map.setCenter(myPosition, zoom);

           

			// var coordenada= new google.maps.LatLng(latitud,longitud);
			// var opciones={

			// 	zoom:15,
			// 	center:coordenada,
			// 	mapTypeId: google.maps.MapTypeId.ROADMAP
			// };

			// var Mapa= new google.maps.Map(document.getElementById("canvas"),opciones);

			// var opciones2={
			// 	position:coordenada,
			// 	map:Mapa,
			// 	title: "Mi ubicación",
			// 	icon: 'imagenes/posicion.png'
			// }
			

			// var evento= new google.maps.LatLng(latitudee,longitudee);

			// var eventop={
			// 				position:evento,
			// 				map:Mapa,
			// 				title: "Evento",
			// 				icon: 'imagenes/radar.png',
			// 				animation: google.maps.Animation.BOUNCE
			// 			};

			// var globo=new google.maps.Marker(opciones2);
			// var eventom=new google.maps.Marker(eventop);
			

		 }
		 
