var Carte = {

    initMap : function(mapContainer, addressContainer) {
    this.map = new google.maps.Map(document.getElementById(mapContainer), {
          zoom: 8,
          center: {lat: 48.848, lng: 2.28}
        });
    this.geocoder = new google.maps.Geocoder();
    this.geocodeAddress(this.geocoder, this.map, addressContainer);
  },

    geocodeAddress : function(geocoder, resultsMap, addressContainer) {
        address = $(addressContainer).html();
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                marker = new google.maps.Marker({
                  map: resultsMap,
                  position: results[0].geometry.location
                });
            } else {
            alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    } 

}