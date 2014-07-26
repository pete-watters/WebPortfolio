// Filename: views/documents/main
define([
  'jquery',
  'underscore',
  'backbone',  
  // Pull in the Collection module from above
  'collections/documents',
  'text!templates/dashboard/main.html'

], function($, _, Backbone, DocumentsCollection, documentListTemplate){
  var documentListView = Backbone.View.extend({
    el: $("#canvas"),
    initialize: function(){


      var breadCrumb_Data = '<span class="divider">/</span></li><li class="active"><a href="#/dashboard"><i class="icon-list-alt"></i><span>Dashboard</span></a></li>';
      $("#breadcrumb-location").html(breadCrumb_Data);
          // reset tabs 
        $(".workbench-tabs").find(".active").removeClass("active");
        // give active class to current tab
        $(".workbench-tabs").find('#dashboardTabHead').addClass("active");


        $("#workbench-sidebar-navigation").show();
        $("#workbench-sidebar-primaryAction").show();
        $("#workbench-sidebar-context").show();
        $("#workbench-sidebar-CreateTemplate").hide();
        $("#workbench-sidebar-SaveChanges").hide();
        $("#workbench-sidebar-TemplateList").hide();


      var data = clientDocumentData;

      this.collection = new DocumentsCollection();
      this.collection.bind("add", this.exampleBind);

            for(var i=0; i < data.length; i++){
                  this.collection = this.collection.add(data[i]);
            }

    },
    exampleBind: function( model ){
 //     console.log(model);
    },
    render: function(){
      var data = {
        documents: this.collection.models,
        _: _ 
      };
      var compiledTemplate = _.template( documentListTemplate, data );
      this.$el.html( compiledTemplate ); 
    }
  });


  return documentListView;
});
