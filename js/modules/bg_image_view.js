define([
  'backbone'
], function(Backbone){
	var BgImageView = Backbone.View.extend({
		initialize:function( options ){
			this.id = this.el.getAttribute("data-id");

			this.$el.addClass("bg_image_view");

			if(options.image_url){
				this.image_url = options.image_url;
			} else if( this.el.hasAttribute("data-image") ){ 
				this.image_url = this.el.getAttribute("data-image");
			}

			if( this.image_url ){
				this.loadimage();
			} else {
				console.log("No image found: ", this.id );
			}
		},
		loadimage:function(){
			var _t = this;
			
			_t.img = new Image();
			_t.img.onload = function(e){
				_t.$el.css({
					"background-image":"url(" + _t.image_url + ")"
				});

				

				setTimeout(function(){
					_t.trigger("ready");
					_t.$el.addClass("ready");
				},200 + ( Math.random()*1800 ));	
			};
			_t.img.src = _t.image_url;
		}
	});
	return BgImageView;
});