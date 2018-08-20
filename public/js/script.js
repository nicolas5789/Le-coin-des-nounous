$(document).ready( function () {

    $('.table_pag').DataTable();

    if($("#address").html() != null) {
      var carteNounou = Object.create(Carte);
      carteNounou.initMap('map', "#address", 10); 
    }
    
    if($("#addressContact").html() != null) {
      var carteContact = Object.create(Carte);
      carteContact.initMap('map', "#addressContact", 11); 
    }
    
} );

