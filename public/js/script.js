$(document).ready( function () {

    $('.table_pag').DataTable();

    if($("#address").html() != null) {
      var carteNounou = Object.create(Carte);
      carteNounou.initMap('map', "#address", 8); 
    }
    
    if($("#addressContact").html() != null) {
      var carteContact = Object.create(Carte);
      carteContact.initMap('map', "#addressContact", 11); 
    }
    
} );

/*
var plan = Object.create(Carte);
plan.initMap();
*/

/*
initMap();
function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 48.848, lng: 2.28}
        });
        var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = $("#address").html();
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
*/
