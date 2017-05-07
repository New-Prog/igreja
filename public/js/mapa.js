  
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
	  
	    map = new google.maps.Map(document.getElementById('map'), {
		      scrollwheel: true,
		    });


		request('/api/reunioes', null, 'GET')
		.done(function(response) {
			var bounds = new google.maps.LatLngBounds();
			
			for(var i in response) {
				var latlng = new google.maps.LatLng(response[i].latitude, response[i].longitude);
				
				var marker = new google.maps.Marker({
					//icon: icon,
					map: map,
					position: latlng
				});
				
				addListeners(marker, response[i]);
				
				bounds.extend(latlng);
			}
			
			map.fitBounds(bounds);
		})
		.fail(function(response) {
			console.log("ERRO AO MONTAR OS MARCADORES - ", response);
		});
      

	}
	
	function addListeners(marker, reuniao) {
		  var content = ' <div id="iw_container" style="width: 300px;heigth:300px">'+
		                '   <span style="float:left"><strong>Descricao: </strong> '+reuniao.descricao+'</span><br>'+
		                '   <span><strong>Tema: </strong> '+reuniao.tema+'</span><br>'+
		                '   <span> <strong>Data: </strong> '+reuniao.data+'</span><br>'+
		                '   <span><strong>Endereço: </strong>'+reuniao.logradouro+', '+reuniao.numero+' </span><br>'+

		                ' </div>';
		  var infowindow = new google.maps.InfoWindow({
		    content: content
		  });

		  marker.addListener('click', function() {
		    infowindow.open(map, marker);
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
	