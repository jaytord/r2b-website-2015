define([
  'pages/page_view',
  'text!template/projects.php'
], function(PageView, Template){
	var ProjectsView = PageView.extend({
		template: _.template( Template ),
		id:"projects",
		onready:function(){
			this.buildprojectgalleries();
		},
		onclose:function(){
		},
	});
	return ProjectsView;
});