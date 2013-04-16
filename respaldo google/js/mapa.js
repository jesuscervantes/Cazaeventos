function mapa(latitud,longitud,latitudee,longitudee)
		 {
		 

			var coordenada= new google.maps.LatLng(latitud,longitud);
			var opciones={

				zoom:15,
				center:coordenada,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			var Mapa= new google.maps.Map(document.getElementById("canvas"),opciones);

			var opciones2={
				position:coordenada,
				map:Mapa,
				title: "Mi ubicación",
				icon: 'imagenes/posicion.png'
			}
			

			var evento= new google.maps.LatLng(latitudee,longitudee);

			var eventop={
							position:evento,
							map:Mapa,
							title: "Evento",
							icon: 'imagenes/radar.png',
							animation: google.maps.Animation.BOUNCE
						};

			var globo=new google.maps.Marker(opciones2);
			var eventom=new google.maps.Marker(eventop);
			

		 }
		 
