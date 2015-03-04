define([
  'pages/page_view',
  'text!template/casestudies.php'
], function(PageView, Template){
	var CasestudiesView = PageView.extend({
		template: _.template( Template ),
		id:"casestudies",
	});
	return CasestudiesView;
});