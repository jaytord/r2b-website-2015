define([
  'pages/page_view',
  'text!template/contact.php',
  'modules/googlemap/googlemap_view'
], function(PageView, Template, GoogleMapView){
	var ContactView = PageView.extend({
		template: _.template( Template ),
		id:"contact",
		onready:function(){
			var _t = this;
			_t.initGoogleMap();
			this.buildprojectgalleries();
		},
		googleready:function(){
			console.log("google ready");
		},
		onclose:function(){
		},
		initGoogleMap:function(){
			this.googlemap = new GoogleMapView();

			console.log(google);
		}
	});
	return ContactView;
});