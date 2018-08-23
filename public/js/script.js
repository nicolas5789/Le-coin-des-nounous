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

    var listeVille = Object.create(ListingCity);
    listeVille.init(".deptSelect", ".cityContainer");

/* Animations */

//Retour accueil si clic return après modif formulaire dans admin

	if($("#adminUpdatePassword").html() != null) {
		if (window.history && window.history.pushState) {
	    	window.history.pushState('forward', null, './#forward');
			$(window).on('popstate', function() {
	      		window.location.replace("https://lecoindesnounous.sailtheweb.com/index.php?action=adminPanel");
	    	});
		}
	}

// Alert si signalement

  $("#reportNounouClic").click(function(){
    alert("Signalement pris en compte");
  })

  $("#reportAvisClic").click(function(){
    alert("Signalement pris en compte");
  })

});

