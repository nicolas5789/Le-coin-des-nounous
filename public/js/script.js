$(document).ready( function () {

//pagination tables avec traduction
    $('.table_pag').dataTable( {
        "language": {
            "info": "Vu de la page _PAGE_ sur _PAGES_", "paginate": {
                "next": "Suivant", "previous" : "Précédent"
            }
        }
    });

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


