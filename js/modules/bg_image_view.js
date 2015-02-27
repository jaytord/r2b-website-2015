define([
  'backbone'
], function(Backbone){
	var BgImageView = Backbone.View.extend({
		initialize:function(options){
			var _t = this;

			_t.id = this.el.getAttribute("data-id");
			
			if( _t.el.hasAttribute("data-image") ) _t.image_url = _t.el.getAttribute("data-image");
			if(_t.image_url) _t.loadimage();
		},
		loadimage:function(){
			var _t = this;
			
			_t.img = new Image();
			_t.img.onload = function(e){
				_t.el.style.backgroundImage = "url(" + _t.image_url + ")";
			};
			_t.img.src = _t.image_url;
		}
	});
	return BgImageView;
});