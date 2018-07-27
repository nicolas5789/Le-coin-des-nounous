var Carte =  {

	initMap : function() {
		this.coordoInit = {lat: 48.848, lng: 2.28};
		this.map = new google.maps.Map(document.getElementById("map"), {
		zoom: 9,
		center: this.coordoInit});
	}
}