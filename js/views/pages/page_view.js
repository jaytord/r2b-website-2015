define([
  'backbone',
  'models/page_model',
  'modules/slider/views/slider_view',
  'modules/project_gallery/project_gallery_view'
], function(Backbone, PageModel, SliderView, ProjectGalleryView){
	var PageView = Backbone.View.extend({
		el: "#page-container",
		initialize:function( options ){
			var _t = this;

			if(options.session) _t.session = options.session;

			_t.model = new PageModel( { id:_t.id } );
			_t.collection.push( _t.model );

			_t.model.on( "change:active", function( _model ){
				if( _model.get("active") == true )
					_t.render();
				else
					_t.close();
			});
		},
		oninit:function(){

		},
		render:function(){
			if(!firstpage){
				console.log("Render page html");

				this.$el.html( this.template() );
				
				ga('send', 'pageview', "/" + this.id);
			} else {
				console.log("first page: not rendering html");
			}

			this.ready();
		},
		ready:function(){
			this.$el.find("a[data-navigate-to]").click(function(e){
				e.preventDefault();
				router.navigate( this.getAttribute("data-navigate-to"),true );
			});

			this.$el.find('a[href*=#]').click(function(e){     
            	e.preventDefault();
	            $('body').animate( {scrollTop: ($(this.hash).offset().top-33) + "px"} , 500);
	        });

			this.onready();
			
			$("#page-container").delay(300).animate({opacity:1},400);
			$("#footer-container").delay(700).animate({opacity:1},400);

			console.log("page ready");
		},
		buildprojectgalleries:function(){
			console.log("build project galleries");

			var _t = this;

			_t.project_galleries = [];

			this.$el.find(".cfm-project-gallery").each( function( i, _el ){
				var project_gallery = new ProjectGalleryView( {
				  id:_el.getAttribute("id"), el:_el
				});

				_t.project_galleries.push( project_gallery );
			});

			console.log("build galleries complete");
		},
		onready:function(){},
		onready:function(){/*overridden*/},
		close:function(){
			this.onclose();
			
			_.each(this.project_galleries,function(gallery){
				gallery.remove();
			});
		},
		onclose:function(){ /*overridden*/}
	});
	return PageView;
});