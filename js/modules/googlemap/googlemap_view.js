define([
  'backbone'
], function(Backbone){
	var GoogleMapView = Backbone.View.extend({
		initialize:function(){
			var mapOptions = {
	            zoom: 15,
	            backgroundColor:"#FFF",
				scrollwheel: false,
				disableDoubleClickZoom: true,
	            center: new google.maps.LatLng(40.7413197,-73.9913,18),
	            streetViewControl: false,
	            panControl: false,
				zoomControl: false,
				draggable:false,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				overviewMapControl: false,
	            styles: [
	            	{
	            		featureType:"administrative",
	            		elementType:"all",
	            		stylers:[
	            			{visibility:"off"}
	            		]
	            	},
	            	{
	            		featureType:"road",
	            		elementType:"all",
	            		stylers:[
	            			{visibility:"simplified"},
	            			{saturation:-100},
	            			{lightness:10}
	            		]
	            	},
	            	{
	            		featureType:"water",
	            		elementType:"all",
	            		stylers:[
	            			{visibility:"on"},
	            			{color:"#222222"},
	            			{lightness:0}
	            		]
	            	},
	            	{
	            		featureType:"water",
	            		elementType:"labels",
	            		stylers:[
	            			{visibility:"off"}
	            		]
	            	},
	            	{
	            		featureType:"landscape.man_made",
	            		elementType:"all",
	            		stylers:[
	            			{visibility:"off"}
	            		]
	            	},
	            	{
	            		featureType:"landscape.natural",
	            		elementType:"off",
	            		stylers:[
	            			{visibility:"simplified"},
	            			{saturation:-100},
	            			{lightness:0}
	            		]
	            	},	
	            	{
	            		featureType:"poi",
	            		elementType:"all",
	            		stylers:[
	            			{visibility:"off"}
	            		]
	            	},
	            	{
	            		featureType:"transit",
	            		elementType:"all",
	            		stylers:[
	            			{visibility:"off"}
	            		]
	            	}
	            ]
	        };

	        var mapElement = document.getElementById('map');

	   		var markerLatLng = new google.maps.LatLng(40.7413197,-73.9913,18);

	        var map = new google.maps.Map(mapElement, mapOptions);

	        var image = {
				url: base_url + 'img/marker.png',
				size: new google.maps.Size(70, 88),
				anchor: new google.maps.Point(22, 86),
				scaledSize: new google.maps.Size(70, 88)
			};
			var shape = {
		    	coords: [1, 1, 1, 60, 44, 60, 44 , 1],
					type: 'poly'
			};
	        var marker = new google.maps.Marker({
				position: markerLatLng,
				map: map,
				animation: google.maps.Animation.DROP,
				title:"Hello World!",
				icon:image,
				shape:shape
			});

			var getCen = map.getCenter();

			google.maps.event.addDomListener(window, 'resize', function() {
				map.setCenter(getCen);
			});
		}
	});

	return GoogleMapView;
});