define([
  'backbone',
  'modules/bg_image_view'
], function(Backbone, BgImageView){
	var ProjectView = Backbone.View.extend({
		initialize:function(options){
			var _t = this;

			_t.id = this.el.getAttribute("data-id");

			_t.a_el = _t.$el.find("a.cfm-project")[0];

			_t.bgimage = new BgImageView({ el:_t.a_el });
			
			_t.model = new Backbone.Model({ id:_t.id });

			_t.bgimage = new BgImageView({ el:_t.a_el });

			if( _t.el.hasAttribute("data-image") ){
				_t.bgimage = new BgImageView({ el:_t.a_el, image_url: _t.el.getAttribute("data-image"), id:_t.id + "bg-image" });
			}
		}
	});
	return ProjectView;
});