// Filename: router.js
/*
* This is where links are handled and views are rendered accordingly
*
*
*/
define([
  'jquery',
  'underscore',
  'backbone',
  'bootstrap'
], function($, _, Backbone ){
  var AppRouter = Backbone.Router.extend({
    routes: {
      // Define some URL routes
      'home' : 'defaultAction',
      'dashboard': 'showDashboard',
      'admin': 'showAdmin',
      'clientTemplates': 'showTemplates',
      
      // Default
      '*actions': 'defaultAction'
    }
  });
  var initialize = function(){

    var app_router = new AppRouter;
    app_router.on('route:showDashboard', function(){
      require(['views/dashboard/main'], function(DocumentListView) {
        // Call render on the module we loaded in via the dependency array
        // 'views/documents/list'

        var documentListView = new DocumentListView();
        documentListView.render();

              // show more info on hover over thumbnails
             $(".thumbnail").hover(
                function () {
                    //stuff to do on mouseenter
                    $(this).find(".dashboard-thumbnail-blockquote").show();

                },  //notice the comma
                  function () {
                   //stuff to do on mouseleave
                   $(this).find(".dashboard-thumbnail-blockquote").hide();

                  }
                );

      });


                  require(['views/widgets/googleChartWidget'], function(googleChartWidgetView) {
                    var GoogleChartWidgetView = new googleChartWidgetView();
                    GoogleChartWidgetView.render();
                    console.log("render chart");
                  });

    });

    app_router.on('route:showAdmin', function () {
      require(['views/admin/main'], function(QuestionListView) {
        var questionListView = new QuestionListView();
        questionListView.render();
      });
    });

    app_router.on('route:showTemplates', function () {
      require(['views/templates/main'], function(MainTemplatesView) {
        var mainTemplatesView = new MainTemplatesView();
        mainTemplatesView.render();
      });
    });

/*
* @function: setupPageView
* @ param: viewDirectory - this is the directory for this sections view files
*                 
*/


   // DEFAULT HOME VIEW
    app_router.on('route:defaultAction', function (actions) {
       

                    require(['views/home/main'], function(MainHomeView) {
                      var mainHomeView = new MainHomeView();
                      mainHomeView.render();

                                  /* Dependancies for home */
                                  require(['views/home/topSection'], function(TopSectionView) {
                                          var topSectionView = new TopSectionView();
                                          topSectionView.render();
                                  });

                                  require(['views/home/CanvasMain'], function(CanvasMainView) {
                                          var canvasMainView = new CanvasMainView();
                                          canvasMainView.render();
                                  });
                                  require(['views/home/WorkbenchSidebar'], function(WorkbenchSidebarView) {
                                    var workbenchSidebarView = new WorkbenchSidebarView();
                                    workbenchSidebarView.render();


                                            require(['views/widgets/searchWidget'], function(searchWidgetView) {
                                              var SearchWidgetView = new searchWidgetView();
                                              SearchWidgetView.render();
                                            });
                                            require(['views/widgets/myProfileWidget'], function(myProfileWidgetView) {
                                              var MyProfileWidgetView = new myProfileWidgetView();
                                              MyProfileWidgetView.render();
                                            });
                                  });

                    });

    });
    
    // Start Backbone history a necessary step for bookmarkable URL's
    Backbone.history.start();
  };
  return { 
    initialize: initialize
  };
});
