var map;
	function initialize(lat,lon,z) {
		//alert("cero");
		var mapOptions = {
		  center: new google.maps.LatLng(lat, lon),
		  zoom: z,
		  panControl: false,
		  streetViewControl: false,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		if(typeof(map) == "undefined"){
			map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
			// Add a listener for the click event
			google.maps.event.addListener(map, 'click', function(event) {
				placeMarker(event.latLng);
			});
			document.getElementById('map_canvas2').style['display'] = "block";
		} else {
			//alert("Aqui");
			map.setOptions(mapOptions);
		}

	}	
	function updatemap(lat,lon,z) {
		var mapOptions = {
		  center: new google.maps.LatLng(lat, lon),
		  zoom: z,
		  panControl: false,
		  streetViewControl: false,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map.setOptions(mapOptions);
	}	
	var marker;
	var xy;
	function placeMarker(location) {
		if (marker==null){ 
			marker = new google.maps.Marker({
				position: location,
				map: map,
				icon: new google.maps.MarkerImage('images/bandera-roja.png')
			});

			map.setCenter(location);
			marker.position;
			//alert("uno");
		} else {
			marker.setPosition(location);
			//alert("dos");
		}
		//xy=marker.position;
		document.getElementById('latlon').value=marker.position+"_"+map.zoom;
	}
