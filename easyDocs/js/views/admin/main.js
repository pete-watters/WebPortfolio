// Filename: views/projects/list
define([
  'jquery',
  'underscore',
  'backbone',
  // Pull in the Collection module from above
  'collections/questions',
  'text!templates/admin/main.html'
], function($, _, Backbone, QuestionsCollection, adminTemplate){
  var UserListView = Backbone.View.extend({
    el: $("#canvas"),
    initialize: function(){
      
      var breadCrumb_Data = '<span class="divider">/</span></li><li class="active"><a href="#/admin"><i class="icon-wrench"></i><span>Admin</span></a></li>';
      $("#breadcrumb-location").html(breadCrumb_Data);
          // reset tabs 
        $(".workbench-tabs").find(".active").removeClass("active");
        // give active class to current tab
        $(".workbench-tabs").find('#adminTabHead').addClass("active");




        $("#workbench-sidebar-navigation").hide();
        $("#workbench-sidebar-primaryAction").show();
        $("#workbench-sidebar-context").show();
        $("#workbench-sidebar-CreateTemplate").hide();
        $("#workbench-sidebar-SaveChanges").hide();
        $("#workbench-sidebar-TemplateList").show();


         var data = clientQuestionData;

      this.collection = new QuestionsCollection();
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
          questions: this.collection.models,
          _: _ 
        };

      var compiledTemplate = _.template( adminTemplate, data );
      this.$el.html( compiledTemplate ); 
    }
  });
  return UserListView;
});
