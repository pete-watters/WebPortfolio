// Filename: views/templates/main
define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/templates/main.html'

], function($, _, Backbone, documentListTemplate){
  var documentsListView = Backbone.View.extend({
    el: $("#canvas"),
    initialize: function(){


      var breadCrumb_Data = '<span class="divider">/</span></li><li class="active"><a href="#/clientTemplates"><i class="icon-file"></i><span>Templates</span></a></li>';
      $("#breadcrumb-location").html(breadCrumb_Data);
          // reset tabs 
        $(".workbench-tabs").find(".active").removeClass("active");
        // give active class to current tab
        $(".workbench-tabs").find('#clientTemplatesTabHead').addClass("active");
        
        $("#workbench-sidebar-navigation").hide();
        $("#workbench-sidebar-primaryAction").hide();
        $("#workbench-sidebar-context").hide();
        $("#workbench-sidebar-CreateTemplate").show();
        $("#workbench-sidebar-SaveChanges").show();
        $("#workbench-sidebar-TemplateList").show();


    },
    exampleBind: function( model ){
      //console.log(model);
    },
    render: function(){
      var data = {};
      var compiledTemplate = _.template( documentListTemplate, data );
      this.$el.html( compiledTemplate ); 
    }
  });
  return documentsListView;
});
