define([
  'pages/page_view',
  'text!template/home.php',
  'modules/videoplayer/views/videoplayer_view'
], function(PageView, Template, VideoPlayerView){
	var HomeView = PageView.extend({
		videos:[],
		template: _.template( Template ),
		id:"home",
		onready:function(){
			var _t = this;

			_t.$el.find(".cfm-videoplayer").each(function(){
				var url = this.getAttribute("data-video-name"),
				poster = this.getAttribute("data-poster"),
				video = new VideoPlayerView({el:this});

				url += mp4 ? ".mp4" : ".webm";
				
				video.load( url, mp4 ? "mp4" : "webm", poster );

				_t.videos.push(video);
			});

			this.buildprojectgalleries();
		},
		resetothervideos:function(_id){
			$.each(this.videos,function(i,v){
				if(v.id != _id) v.reset();
			});
		},
		onclose:function(){
			$.each(this.videos,function(i,v){
				v.remove();
			});
		},
	});
	return HomeView;
});