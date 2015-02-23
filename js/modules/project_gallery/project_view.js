define([
  'backbone'
], function(Backbone){
	var ProjectView = Backbone.View.extend({
		initialize:function(options){
			var _t = this;

			_t.id = this.el.getAttribute("data-id");
			_t.a_el = _t.$el.find("a.cfm-project")[0];
			
			_t.model = new Backbone.Model({ id:_t.id });

			if( _t.el.hasAttribute("data-image") ) _t.image_url = _t.el.getAttribute("data-image");
			if(_t.image_url) _t.loadimage();

			console.log("new project", _t.el);
		},
		loadimage:function(){
			var _t = this;
			
			_t.img = new Image();
			_t.img.onload = function(e){
				_t.a_el.style.backgroundImage = "url(" + _t.image_url + ")";
			};
			_t.img.src = _t.image_url;
		}
	});
	return ProjectView;
});