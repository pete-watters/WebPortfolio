define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/widgets/searchWidget.html'

], function($, _, Backbone, searchWidgetTemplate){
  var searchWidgetView = Backbone.View.extend({
    el: $("#workbench-sidebar-navigation"),
    initialize: function(){

    },
    exampleBind: function( model ){
      //console.log(model);
    },
    render: function(){
      var data = {};
      var compiledTemplate = _.template( searchWidgetTemplate, data );
      this.$el.html( compiledTemplate ); 
    }
  });
  return searchWidgetView;
});
