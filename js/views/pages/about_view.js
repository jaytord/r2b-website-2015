define([
  'pages/page_view',
  'text!template/about.php',
  'modules/videoplayer/views/videoplayer_view'
], function(PageView, Template, VideoPlayerView){
	var AboutView = PageView.extend({
		template: _.template( Template ),
		id:"about",
		onready:function(){
			var _t = this;

			var video_el = _t.$el.find("#about-video.cfm-videoplayer")[0];
			var video_url = video_el.getAttribute("data-video");
			var poster_url = video_el.getAttribute("data-poster");

			this.videoplayer = new VideoPlayerView({el:video_el});

			this.videoplayer.load( video_url, "mp4", poster_url );
		},
		onclose:function(){
		},
	});
	return AboutView;
});