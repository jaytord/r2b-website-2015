define([
  'backbone'
], function(Backbone){
	var VideoPlayerControlsView = Backbone.View.extend({
        hasplayed:false,
		initialize:function(options){
			this.video_el                    = options.video_el;

            this.playButton                  = this.$el.find( ".cfm-video-play-pause-btn")[0];
            this.muteButton                  = this.$el.find( ".cfm-video-mute-btn")[0];
            this.fullScreenButton            = this.$el.find( ".cfm-video-fullscreen-btn")[0];
            this.progressBarContainer        = this.$el.find( ".cfm-video-progress-container")[0];
            this.seekBar                     = this.$el.find( ".cfm-video-seek-bar")[0];
            this.seekBarInput                = this.$el.find( ".cfm-video-seek-bar-input")[0];
            this.buffer                      = this.$el.find( ".cfm-video-buffer-icon")[0];

            this.ready();
		},
        ready:function(){
        	var _t = this;

            // Event listener for the play/pause button
            $(_t.playButton).mousedown(function() {
                if (_t.video_el.paused == true) {
                    _t.video_el.play();
                } else {
                    _t.video_el.pause();
                }
            });

            // Event listener for the mute button
            $(_t.muteButton).click(function() {
                if (_t.video_el.muted == false) {
                    _t.video_el.muted = true;
                } else {
                    _t.video_el.muted = false;
                }

                _t.muteButton.classList.toggle('active');
            });

            // Event listener for the full-screen button
            $(_t.fullScreenButton).click(function() {
                if( _t.video_el.requestFullscreen ){
                    _t.video_el.requestFullscreen();
                }else if( _t.video_el.mozRequestFullScreen ){
                    _t.video_el.mozRequestFullScreen(); // Firefox
                }else if( _t.video_el.webkitRequestFullscreen ){
                    _t.video_el.webkitRequestFullscreen(); // Chrome and Safari
                }
            });

            // Event listener for the seek bar
            $(_t.seekBarInput).on("change", function() {
                var time = _t.video_el.duration * (_t.seekBarInput.value / 100);
                _t.video_el.currentTime = time;
            });

            $(_t.video_el).on("mousemove", function() {
            	clearTimeout(_t.hidecontrolsto);
                clearTimeout(_t.showcontrolsto);

                _t.showcontrolsto = setTimeout( function(){
                	_t.showControls();
                }, 50);
                
                _t.hidecontrolsto = setTimeout( function(){
                	_t.hideControls();
                }, 1000);
            });

            $(_t.video_el).on("mouseout", function() {
                clearTimeout(_t.hidecontrolsto);
                clearTimeout(_t.showcontrolsto);

                _t.hidecontrolsto = setTimeout( function(){
                	_t.hideControls();
                }, 50);
            });

            $(_t.el).on("mouseout", function() {
                clearTimeout(_t.hidecontrolsto);
                clearTimeout(_t.showcontrolsto);

                _t.hidecontrolsto = setTimeout( function(){
                	_t.hideControls();
                }, 50);
            });

            $(_t.el).on("mousemove", function() {
                clearTimeout(_t.hidecontrolsto);
                clearTimeout(_t.showcontrolsto);
                _t.showControls();
            });
        },
        reset:function(){
            this.hasplayed          = false;
            this.playing            = false;
            this.el.style.opacity   = "0";
        },
        onprogress:function(_value){
        	this.progressBarContainer.style.backgroundSize = _value + "% 40px";
        },
        ontimeupdate:function(_value){
        	this.seekBar.style.width = _value + "%";
        },
		toPlayingState:function(){
			this.playing = true;
            this.hasplayed = true;

			console.log("toPlayingState", this.playing);

			if( !$(this.playButton).hasClass("active") )
				$(this.playButton).addClass("active");

            if(ipad == true) this.showControls();
		},
		toPausedState:function(){
			this.playing = false;

			$(this.playButton).removeClass("active");

			this.showControls();
		},
		showBuffering:function(){
			this.buffer.style.opacity = ".5";
		},
		hideBuffering:function(){
			this.buffer.style.opacity = "0";
		},
		showControls:function(){
			console.log("show");

            if( this.hasplayed && !mobile )
			 this.el.style.opacity = ".75";
		},
		hideControls:function(){
			console.log("hide", this.playing);

			if(this.playing && ipad == false)
				this.el.style.opacity = "0";
		}
	});

	return VideoPlayerControlsView;
});