// Exécute un appel AJAX GET
// Prend en paramètres l'URL cible et la fonction callback appelée en cas de succès
function ajaxGet(url, callback) {
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            // Appelle la fonction callback en lui passant la réponse de la requête
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });
    req.send(null);
}

$(".deptSelect").click(function() {
	
	deptSelected = $(".deptSelect").val();
	
	ajaxGet("http://localhost:8888/p5/le_coin_des_nounous/public/json/cities"+deptSelected+".json", function(reponse) {
	var cities = JSON.parse(reponse);
	cities.forEach(function(cityObject) {
		$(".cityContainer").append('<option>'+ cityObject.city + '</option>');
	})
});

})

/*
ajaxGet("http://localhost:8888/p5/le_coin_des_nounous/public/json/cities"+dept+".json", function(reponse) {
	var cities = JSON.parse(reponse);
	cities.forEach(function(cityObject) {
		$(".cityContainer").append('<option>'+ cityObject.city + '</option>');
	})
});

*/