define([
  'pages/page_view',
  'text!template/campaigns.php'
], function(PageView, Template){
	var CampaignsView = PageView.extend({
		template: _.template( Template ),
		id:"campaigns",
		onready:function(){
			this.buildprojectgalleries();
		},
		onclose:function(){
		},
	});
	return CampaignsView;
});