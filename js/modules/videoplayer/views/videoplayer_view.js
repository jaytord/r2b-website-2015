define([
	'backbone',
    'modules/videoplayer/views/videoplayer-controls_view',
    'modules/bg_image_view'
], function( Backbone , VideoPlayerControlsView , BgImageView){
    var VideoPlayerView = Backbone.View.extend({
        hasplayed:false,
        initialize:function(options){
            var _t = this;

            _t.id = _t.el.getAttribute("id");

            _t.poster                       = _t.$el.find( "div.cfm-videoplayer-poster" )[0];
            _t.video                        = _t.$el.find( "video.cfm-videoplayer-desktop" )[0];
            _t.mobile_video                 = _t.$el.find( "video.cfm-videoplayer-mobile" )[0];

            if(ipad == false && mobile == false){
                _t.autoplay                     = _t.el.hasAttribute( "autoplay" );
                _t.loop                         = _t.el.hasAttribute( "loop" );
                _t.nocontrols                   = _t.el.hasAttribute( "nocontrols" );

                if( _t.autoplay )   _t.$el.addClass( "autoplay" ); 
                if( _t.loop )       _t.$el.addClass( "loop" ); 
            }

            _t.holdlastframe                = _t.el.hasAttribute( "holdlastframe" );

            _t.model                        = new Backbone.Model( { ready:false } );

            _t.model.on( "change:ready", function( _model ){
                if( _model.get( "ready" ) == true ){
                    if( !_t.$el.hasClass( "ready" ) ){
                        _t.$el.addClass( "ready" ); 

                        _t.onresize();

                        if( mobile == false ){
                            $(_t.poster).click( function(){
                                _t.play();
                            });

                            if( _t.autoplay ) setTimeout( function(){ _t.play(); }, 1000 );
                        } else {

                        }
                    }
                } else {
                    _t.$el.removeClass( "ready" );
                }
            });

            if(mobile == false && ipad == false){
                window.addEventListener("resize", function(){
                    clearTimeout( _t.resizeTO );

                    _t.resizeTO = setTimeout( function(){
                        _t.onresize();
                    }, 100 );
                });
            }
        },
        onresize:function(){
            var _t = this;

            var current_ar = _t.el.offsetHeight/_t.el.offsetWidth;
            var video_ar = _t.video.offsetHeight/_t.video.offsetWidth;

            if(current_ar >= video_ar){
                _t.video.style.height = "100%";
                _t.video.style.width = "auto";
            } else{
                _t.video.style.width = "100%";
                _t.video.style.height = "auto";
            }

            _t.video.style.marginLeft = -(_t.video.offsetWidth/2) + "px";
            _t.video.style.marginTop = -(_t.video.offsetHeight/2) + "px";
        },
        play:function(){
            this.onresize();

            if( mobile == false ){
                this.video.play();
                this.toPlayingState();
            }

            this.trigger("play");
        },
        pause:function(){
            if( mobile == true ){
                this.mobile_video.pause();
            } else {
                this.video.pause();
                this.toPausedState();
            }
        },
        load:function( _url, _type, _poster ){
            var _t = this;

            if( mobile == true ){
                $( _t.video ).remove();

                if( _type ) $( _t.mobile_video ).attr( "type", "video/" + _type );
                if( _url ) $( _t.mobile_video ).attr( "src", _url );

                $( _t.mobile_video ).on( "play", function(){
                        _t.toPlayingState();
                });

                if( iphone ){
                    $( _t.mobile_video ).on( "pause", function(){
                        _t.toPausedState();
                    });
                }
            } else {
                $( _t.mobile_video ).remove();

                if( _type ) $( _t.video ).attr( "type", "video/" + _type );
                if( _url ) $( _t.video ).attr( "src", _url );

                $( _t.video ).on( "timeupdate", function() { //playing progress
                    var value = (100 / _t.video.duration) * _t.video.currentTime;
                    if(_t.controls) _t.controls.ontimeupdate(value);
                });

                $( _t.video ).on( "progress", function() { 
                    if( _t.video.buffered.length > 0 ){
                        var value = (_t.video.buffered.end(0)/_t.video.duration)*100;
                        if(_t.controls) _t.controls.onprogress(value);
                    }
                });

                $( _t.video ).on( "play", function() { 
                    _t.toPlayingState();
                });

                $( _t.video ).on( "playing", function() { 
                    _t.toPlayingState();
                });

                $( _t.video ).on( "pause", function() { 
                    _t.toPausedState();
                });

                $( _t.video ).mousedown(function() {
                    if( _t.hasplayed ){
                        if( _t.playing ){
                            _t.pause();
                        } else {
                            _t.play();
                        }
                    }
                });

                 $( _t.video ).on( "ended", function() {
                    //_t.video.currentTime = 0;
                    //if(_t.controls) _t.controls.ontimeupdate(0);

                    if(_t.loop){  
                        _t.play();                  
                    } else {
                        if( !_t.holdlastframe) _t.reset();
                    }
                });

                if(!_t.nocontrols) _t.controls = new VideoPlayerControlsView({ el: _t.$el.find( "div.cfm-video-controls" )[0], video_el:_t.video });

                _t.onresize();
            }

            if( _poster ) _t.loadposter( _poster );
        },
        reset:function(){
            var _t = this;

            _t.video.pause();
            _t.video.currentTime = 0;

            if(_t.controls) _t.controls.ontimeupdate(0);

            _t.playing          = false;
            _t.autoplay         = false;
           
            _t.$el.removeClass("autoplay");
            _t.$el.removeClass("playing");

            setTimeout(function(){_t.$el.removeClass("paused");},100);

            if(this.controls) this.controls.reset();
        },
        toPausedState:function(){
            this.playing = false;
            this.$el.removeClass("playing");
            if( !this.$el.hasClass("paused") )  this.$el.addClass("paused");
            if(this.controls) this.controls.toPausedState();
        },
        toPlayingState:function(){
            this.hasplayed = true;

            this.onresize();
            
            this.playing = true;
            this.$el.removeClass("paused");
            if( !this.$el.hasClass("playing") )  this.$el.addClass("playing");
            if(this.controls) this.controls.toPlayingState();
        },
        loadposter:function( _url ){
            var _t = this;

            _t.posterimage = new BgImageView({ el:_t.poster, image_url:_url });
            _t.posterimage.on("ready",function(){
                _t.model.set( "ready", true );
            });
        }
    });

    return VideoPlayerView;
});