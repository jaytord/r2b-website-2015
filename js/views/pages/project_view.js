define([
  'pages/page_view',
  'text!template/project.php'
], function(PageView, Template){
	var ProjectView = PageView.extend({
		template: _.template( Template ),
		id:"project",
		onready:function(){
		},
		onclose:function(){
		},
	});
	return ProjectView;
});