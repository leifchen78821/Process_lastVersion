function getMapadress(x,y) {
	
	var mapProp = {
		center : new google.maps.LatLng(x,y),
		zoom : 17,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map($("#googleMap")[0], mapProp);

	var marker = new google.maps.Marker({
		position : new google.maps.LatLng(x,y)
	});

	marker.setMap(map);

	var infowindow = new google.maps.InfoWindow({
		content : "好康在這!!"
	});

	infowindow.open(map, marker);

	
	google.maps.event.addListener(marker, 'click', 
	  function() {
		map.setZoom(10);
		map.setCenter(marker.getPosition());
	  });
	

	google.maps.event.addListener(map, 'click', function(event) {
		var marker = new google.maps.Marker({
			position : event.latLng,
			map : map,
		});
		var infowindow = new google.maps.InfoWindow({
			content: '(' + event.latLng.lat() + ','+ event.latLng.lng() + ')'
		});
		infowindow.open(map, marker);
	});
}