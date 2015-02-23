define([
  'backbone'
], function(Backbone){
	var HamburgerView = Backbone.View.extend({
		events:{
			"click": "onclick"
		},
		initialize:function(){
		},
		onclick:function(e){
			$(document.documentElement).toggleClass("menu-open");
		}
	});
	return HamburgerView;
});