define([
  'jquery',
  'underscore',
  'backbone',
  // Pull in the Collection module from above
  'collections/templates',
  'text!templates/home/main.html'
], function($, _, Backbone, TemplatesCollection, mainHomeTemplate){

  var MainHomeView = Backbone.View.extend({
    el: $("#canvas"),

    initialize: function(){

       var breadCrumb_Data = '';
      $("#breadcrumb-location").html(breadCrumb_Data);
          // reset tabs 
        $(".workbench-tabs").find(".active").removeClass("active");
        // give active class to current tab
        $(".workbench-tabs").find('#homeTabHead').addClass("active");


                
        $("#workbench-sidebar-navigation").show();
        $("#workbench-sidebar-primaryAction").show();
        $("#workbench-sidebar-TemplateList").show();
        $("#workbench-sidebar-context").hide();
        $("#workbench-sidebar-CreateTemplate").hide();
        $("#workbench-sidebar-SaveChanges").hide();


         var data = popularTemplatesData;
            this.collection = new TemplatesCollection();
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
        templates: this.collection.models,
        _: _ 
      };

      var compiledTemplate = _.template( mainHomeTemplate, data );
      this.$el.html( compiledTemplate ); 

      
      
     
  }


  });
  return MainHomeView;
});
