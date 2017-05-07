  
	function request(url, data, type) {
		
		return $.ajax({
			url: url,
			type: type,
			dataType: 'json',
			data: data,
			timeout: 10000
		});
	}
  
	function initMap() {
	  
      var uluru = {lat: -25.363, lng: 131.044};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
      });
      
      
      //request
      
      
      var marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
	}
	  //	REQUEST
	  
	  /*
	  try{
	    var bounds = new google.maps.LatLngBounds();

	    map = new google.maps.Map(document.getElementById('map'), {
	      scrollwheel: true,
	      zoom: 14
	    });

	    var markers = [];

	    for (var i = 0; i < response.length; i++) {

	      var obj_lat_lng = response[i].gps_lat_lng;

	      obj_localizacao.push(obj_lat_lng);

	      var latlng = new google.maps.LatLng(obj_lat_lng.latitude, obj_lat_lng.longitude);

	      var marker = new google.maps.Marker({
	        icon: icon,
	        map: map,
	        position: latlng

	      });
	      addListeners(marker, response[i]);
	      markers.push(marker);
	      bounds.extend(latlng);
	    }

	    var mcOptions = {maxZoom: 15};

	    var markerCluster = new MarkerClusterer(map, markers,mcOptions);

	    map.fitBounds(bounds);

	    insereLogMapa('T',obj_localizacao);
	  } catch(err) {
	    console.log(err);
	    alert('Ocorreu um erro ao exibir o mapa');
	    insereLogMapa('F');
	  }
	  */	
	