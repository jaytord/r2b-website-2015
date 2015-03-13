define([
  'pages/page_view',
  'text!template/clients.php'
], function(PageView, Template){
	var ClientsView = PageView.extend({
		template: _.template( Template ),
		id:"clients",
		onready:function(){
			this.buildprojectgalleries();
		},
		onclose:function(){
		},
	});
	return ClientsView;
});