define([
  'pages/page_view',
  'text!template/project.php',
  'modules/videoplayer/views/videoplayer_view',
  'modules/bg_image_view'
], function(PageView, Template, VideoPlayerView, BgImageView){
	var ProjectView = PageView.extend({
		template: _.template( Template ),
		videos:[],
		onready:function(){
			this.details_container_el = this.$el.find("#project-details-container").eq(0);

			if(firstpage){
				this.initdetails();
			} else {
				this.loadprojectdetails();
			}
		},
		loadprojectdetails:function(){
			var _t = this;

			ga( 'send', 'pageview', _t.model.get("detailslug") );

			$.ajax(
		    {
		        url: base_url + "template/" + _t.id + "/" + _t.model.get("detailslug"),
		        dataType: "html",
		        success: function(data) {
		           _t.details_container_el.html(data);
		           _t.initdetails();
		        },
		        error: function(e) 
		        {
		            console.log('Error: ' + e);
		        }
		    });
		},
		initdetails:function(){
			var _t = this;

			//build videos
			_t.details_container_el.find(".cfm-videoplayer").each(function(){
				var video_url 		= this.getAttribute( "data-video" );
				video_url += mp4 ? ".mp4" : ".webm";
				
				var poster_url 		= this.getAttribute( "data-poster" );
				var videoplayer 	= new VideoPlayerView( { el:this } );

				videoplayer.load( video_url, mp4 ? "mp4" : "webm", poster_url );
				
				_t.videos.push(videoplayer);
			});

			//add navigation events
			this.details_container_el.find("a[data-navigate-to]").click( function(e){
				e.preventDefault();
				router.navigate( this.getAttribute("data-navigate-to"),true );
			});

			//build banner asset images
			this.$el.find(".project-asset-image").each(function(){
				var banner = new BgImageView({el:this});
			});

			this.$el.find('a[href*=#]').click(function(e){     
            	e.preventDefault();
	            $('body').animate( {scrollTop: ($(this.hash).offset().top-33) + "px"} , 500);
	        });

	        this.buildprojectgalleries();
		},
		onclose:function(){
		},
	});
	return ProjectView;
});