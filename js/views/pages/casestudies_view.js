define([
  'pages/page_view',
  'text!template/casestudies.php'
], function(PageView, Template){
	var CaseStudiesView = PageView.extend({
		template: _.template( Template ),
		id:"casestudies",
		onready:function(){
		},
		onclose:function(){
		},
	});
	return CaseStudiesView;
});