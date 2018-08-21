var ListingCity =
{
    init: function(buttonTarger, container){
        $(container).hide();
        var self = this;

        $(buttonTarger).click(function(){
            self.showCity(buttonTarger, container);
        })
    },

    ajaxGet: function(url, callback){
        var req = new XMLHttpRequest();
        req.open("GET", url);
        req.addEventListener("load", function () {
            if (req.status >= 200 && req.status < 400) {
                callback(req.responseText);
            } else {
                console.error(req.status + " " + req.statusText + " " + url);
            }
        });
        req.addEventListener("error", function () {
            console.error("Erreur réseau avec l'URL " + url);
        });
        req.send(null);   
        },


    showCity: function(buttonTarger, container){
        deptSelected = $(buttonTarger).val();
        $(container).empty();
        $(container).show();

        //this.ajaxGet("http://localhost:8888/p5/le_coin_des_nounous/public/json/cities"+deptSelected+".json", function(reponse) { //En local
        this.ajaxGet("https://www.lecoindesnounous.sailtheweb.com/public/json/cities"+deptSelected+".json", function(reponse) {   //En ligne
        var cities = JSON.parse(reponse);
        cities.forEach(function(cityObject) {
            $(container).append('<option>'+ cityObject.city + '</option>');
        })
    });
    },

}
