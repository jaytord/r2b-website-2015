define([
	'backbone',
    'modules/videoplayer/views/videoplayer-controls_view'
], function( Backbone , VideoPlayerControlsView ){
    var VideoPlayerView = Backbone.View.extend({
        initialize:function(options){
            var _t = this;

            _t.poster                       = _t.$el.find( "div.cfm-videoplayer-poster" )[0];
            _t.video                        = _t.$el.find( "video.cfm-videoplayer-desktop" )[0];
            _t.mobile_video                 = _t.$el.find( "video.cfm-videoplayer-mobile" )[0];

            _t.model          = new Backbone.Model( { ready:false } );

            _t.model.on( "change:ready", function( _model ){
                if( _model.get( "ready" ) == true ){
                    if( !_t.$el.hasClass( "ready" ) )
                        _t.$el.addClass( "ready" );
                } else {
                    _t.$el.removeClass( "ready" );
                }
            });

            window.addEventListener("resize", function(){
                clearTimeout( _t.resizeTO );

                _t.resizeTO = setTimeout( function(){
                    _t.onresize();
                }, 100 );
            });
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
                this.controls.toPlayingState();
            }
        },
        pause:function(){
            if( mobile == true ){
                this.mobile_video.pause();
            } else {
                this.video.pause();
                this.controls.toPausedState();
            }


        },
        load:function( _url, _type, _poster ){
            var _t = this;

            if( mobile == true ){
                $( _t.video ).remove();

                if( _type ) $( _t.mobile_video ).attr( "type", "video/" + _type );
                if( _url ) $( _t.mobile_video ).attr( "src", _url );

                $( _t.mobile_video ).on( "play", function(){
                    $( _t.mobile_video ).css( "opacity",1 );
                });

                if( iphone ){
                    $( _t.mobile_video ).on( "pause", function(){
                        $( _t.mobile_video ).css( "opacity",0 );
                    });
                }
            } else {
                $( _t.mobile_video ).remove();

                if( _type ) $( _t.video ).attr( "type", "video/" + _type );
                if( _url ) $( _t.video ).attr( "src", _url );

                $( _t.video ).on( "timeupdate", function() { //playing progress
                    var value = (100 / _t.video.duration) * _t.video.currentTime;
                    _t.controls.ontimeupdate(value);
                });

                $( _t.video ).on( "progress", function() { 
                    if( _t.video.buffered.length > 0 ){
                        var value = (_t.video.buffered.end(0)/_t.video.duration)*100;
                        _t.controls.onprogress(value);
                    }
                });

                $( _t.video ).on( "play", function() { 
                    _t.controls.toPlayingState();
                    $( _t.poster ).fadeOut( 400 );
                });

                $( _t.video ).on( "playing", function() { 
                    _t.controls.toPlayingState();
                });

                $( _t.video ).on( "pause", function() { 
                    _t.controls.toPausedState();
                    $( _t.poster ).fadeIn( 400 );
                });

                 $( _t.video ).on( "ended", function() {
                    _t.video.currentTime = 0;
                    _t.controls.ontimeupdate(0);
                    _t.controls.toPausedState();

                    $( _t.poster ).fadeIn( 400 );
                });

                _t.controls = new VideoPlayerControlsView({ el: _t.$el.find( "div.cfm-video-controls" )[0], video_el:_t.video });

                _t.onresize();
            }

            if( _poster ) _t.loadposter( _poster );
        },
        loadposter:function( _url ){
            var _t = this, img = new Image();

            img.onload = function(){
                $( _t.poster ).attr( "style", "background-image:url(" + _url + ")" );

                _t.model.set( "ready", true );

                $(_t.poster).click( function(){
                    _t.play();
                });
            }   

            img.src = _url;
        }
    });

    return VideoPlayerView;
});