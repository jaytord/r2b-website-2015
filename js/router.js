define([
  'backbone',
  'collections/page_collection',
  'pages/home_view',
  'pages/projects_view',
  'pages/casestudies_view',
  'pages/about_view',
  'pages/clients_view',
  'pages/project_view',
  'pages/contact_view',
  'modules/navigation/views/navigation_view',
  'modules/videoplayer/views/videoplayer_view',
  'modules/hamburger/hamburger_view'
], function (Backbone, PageCollection, HomeView, ProjectsView, CaseStudiesView, AboutView, ClientsView, ProjectView, ContactView, NavigationView, VideoPlayerView, HamburgerView){
  var Router   = Backbone.Router.extend({
    initialize:function(){
      var _t = this;

      _t.page_collection = new PageCollection();
      
      _t.page_views = [   
        new HomeView({ collection:_t.page_collection }),
        new ProjectsView({ collection:_t.page_collection }),
        new CaseStudiesView({ collection:_t.page_collection }),
        new AboutView({ collection:_t.page_collection }),
        new ClientsView({ collection:_t.page_collection }),
        new ProjectView({ collection:_t.page_collection, id:"casestudy"}),
        new ProjectView({ collection:_t.page_collection, id:"project"}),
        new ContactView({ collection:_t.page_collection })
      ];

      $("#logo a").click(function(event){
        event.preventDefault();
        router.navigate("home",true);
      })

      /** ===== BUILD NAVIGATIONS ===== **/
      _t.navigations = [];

      $(".cfm-navigation").each(function(i, _el){
        var navigation = new NavigationView({
          id:_el.getAttribute("id"), el:_el, page_collection:_t.page_collection
        });

        _t.navigations.push(navigation);
      });

      _t.hamburger = new HamburgerView({el:document.getElementById("hamburger")});

      this.start();
    },
    start:function(){
      Backbone.history.start( {pushState: pushstate ? true : false, hashChange:true, silent:false, root:root_dir} );
    },
    routes: {
      ':pageid/:id'           : 'onchangepage',
      ':pageid'               : 'onchangepage',
      '*actions'              : 'onchangepage'
    },
    onchangepage:function(_pageid, _detailslug){
      var _t = this;

      !_pageid ? _pageid = "home" : null;

      $(document.documentElement).removeClass("menu-open");
      $(window).scrollTop(0);
      $(".site-wrapper").scrollTop(0);
      $("#footer-container").hide();

      if( !firstpage ) $("#page-container").css( {opacity:0} );
      
      _t.page_collection.activatePageById( _pageid, _detailslug );
      
      if( firstpage ) firstpage = false;

      $("#page-labels ul li").each( function(k,li){
        if( li.getAttribute("data-page-id") == _pageid ){
          li.className = "active";
          $("#page-labels ul").css("margin-top", (-li.offsetTop) + "px");
        } else {
          li.className = "";
        }
      });
    }
  });

  return Router;
});