/* NE FONCTIONNE PAS
var Carte =  {

	initMap : function() {
		this.coordoInit = {lat: 48.848, lng: 2.28};
		this.map = new google.maps.Map(document.getElementById("map"), {
		zoom: 9,
		center: this.coordoInit});

		//this.geocodeAddress(geocoder, map);
	}

	geocodeAddress: function(geocoder, resultsMap) {
		var address = $("#address").html();
        console.log(address);

        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });	
	}

}
*/
