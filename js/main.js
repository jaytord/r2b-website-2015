'use strict';

var router,pushstate=false,mobile=false,retina=false,mp4=false,ipad=false,iphone=false,ie=false,ie8=false,android=false,firstpage = true;

require.config({
    baseUrl: base_url,
    paths: {    
        jquery:         'js/vendor/jquery.min',
        backbone:       'js/vendor/backbone.min',
        underscore:     'js/vendor/underscore.min',
        text:           'js/vendor/text.min',
        googlemaps:     'js/vendor/googlemaps.min',
        router:         'js/router',
        collections:    'js/collections',
        pages:          'js/views/pages',
        modules:        'js/modules',
        models:         'js/models'
    }
});

require([
    'jquery',
    'underscore',
    'router'
], function( $, _, Router ) {
    $(document).ready(function(){
        /*----- user agent ------*/
        var uagent = navigator.userAgent.toLowerCase(),body = document.body,
        mobile_search = [ "iphone","ipod","series60","symbian","android","windows ce","windows7phone","w7p","blackberry","palm" ];
        
        /*--------mobile---------*/
        for(var i in mobile_search){
            if( uagent.search( mobile_search[i] ) > -1 ){
                mobile = true; break;
            }
        }

        /*--------retina---------*/
        retina = mobile && window.devicePixelRatio > 1;

        /*--------pushstate---------*/
        pushstate = !!(window.history && window.history.pushState);

        /*--------mp4---------*/
        mp4 = ( Modernizr.video && document.createElement('video').canPlayType('video/mp4; codecs=avc1.42E01E,mp4a.40.2') );
        if(mp4 == "probably" || mp4 == "maybe"){
            mp4 = true;
        } else {
            mp4 = false;
        }
        
        /*--------ie,ie8---------*/
        if( uagent.search( "msie" ) > -1 ) ie = true;
        ie8 = $(body).hasClass("ie8");

        /*--------ipad,iphone---------*/
        if( uagent.search( "ipad" ) > -1 ) ipad = true;
        if( uagent.search( "iphone" ) > -1 ) iphone = true;
        if( uagent.search( "android" ) > -1 ) android = true;

        /*-------- set body tags ---------*/
        if(mobile) document.documentElement.className += " mobile";
        if(pushstate) document.documentElement.className += " pushstate";
        if(retina) document.documentElement.className += " retina";
        if(mp4) document.documentElement.className += " mp4";
        if(ipad) document.documentElement.className += " ipad";
        if(iphone) document.documentElement.className += " iphone";
        if(android) document.documentElement.className += " android";
        if(ie) document.documentElement.className += " ie";
        if(debug) document.documentElement.className += " debug";

        if(!mobile) disablepointeronscroll();

        /*----- init router ------*/
        router = new Router();
    });
});