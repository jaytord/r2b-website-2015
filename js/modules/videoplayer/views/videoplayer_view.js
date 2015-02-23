define([
	'backbone'
], function( Backbone ){
    var VideoPlayerView = Backbone.View.extend({
        initialize:function(){
            var _t = this;

            _t.poster         = _t.$el.find( "div.cfm-videoplayer-poster" )[0];
            _t.video          = _t.$el.find( "video.cfm-videoplayer-desktop" )[0];
            _t.mobile_video   = _t.$el.find( "video.cfm-videoplayer-mobile" )[0];

            _t.model          = new Backbone.Model( { ready:false } );

            _t.model.on( "change:ready", function( _model ){
                if( _model.get( "ready" ) == true ){
                    if( !_t.$el.hasClass( "ready" ) )
                        _t.$el.addClass( "ready" );
                } else {
                    _t.$el.removeClass( "ready" );
                }
            });
        },
        play:function(){
            if( mobile == false ) this.video.play();
        },
        pause:function(){
            if( mobile == true ) this.mobile_video.pause();
            else this.video.pause();
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

                $( _t.video ).on( "play", function(){
                    $( _t.poster ).fadeOut( 200 );
                });
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

                console.log( "load poster complete" );
            }   

            img.src = _url;

            console.log( "loading poster", _url );
        }
    });

    return VideoPlayerView;
});