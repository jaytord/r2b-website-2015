define([
  'pages/page_view',
  'text!template/home.php',
  'modules/videoplayer/views/videoplayer_view'
], function(PageView, Template, VideoPlayerView){
	var HomeView = PageView.extend({
		template: _.template( Template ),
		id:"home",
		onready:function(){
			var _t = this;

			var video_el = _t.$el.find("#reel-video.cfm-videoplayer")[0];
			var video_url = base_url + "video/" + video_el.getAttribute("data-video-name") + ".mp4";
			var poster_url = video_el.getAttribute("data-poster");

			this.videoplayer = new VideoPlayerView({el:video_el});

			this.videoplayer.load( video_url, "mp4", poster_url );
		},
		onclose:function(){
			this.videoplayer.remove();
		},
	});
	return HomeView;
});