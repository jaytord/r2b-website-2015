define([
  'backbone',
  'modules/project_gallery/project_view'
], function(Backbone, ProjectView){
	var ProjectGalleryView = Backbone.View.extend({
		initialize:function(){
			console.log("initialize gallery");

			var _t = this;

			_t.collection = new Backbone.Collection();
			_t.views = [];

			_t.ul_el = this.$el.children("ul")[0];
			_t.project_els = $(_t.ul_el).children("li");
			
			_t.project_els.each(function(i, _el){
				var project = new ProjectView({ el: _el });
				_t.views.push(project);
				_t.collection.push(project.model);
			});
		}
	});
	return ProjectGalleryView;
});