define([
  'pages/page_view',
  'text!template/about.php',
  'modules/videoplayer/views/videoplayer_view'
], function(PageView, Template, VideoPlayerView){
	var AboutView = PageView.extend({
		template: _.template( Template ),
		id:"about",
		onready:function(){
			this.buildprojectgalleries();
		},
		onclose:function(){
		},
	});
	return AboutView;
});