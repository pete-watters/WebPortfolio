define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/widgets/myProfileWidget.html'

], function($, _, Backbone, myProfileWidgetTemplate){
  var myProfileWidgetView = Backbone.View.extend({
    el: $("#workbench-sidebar-primaryAction"),
    initialize: function(){

    },
    exampleBind: function( model ){
      //console.log(model);
    },
    render: function(){
      var data = {};
      var compiledTemplate = _.template( myProfileWidgetTemplate, data );
      this.$el.html( compiledTemplate ); 
    }
  });
  return myProfileWidgetView;
});
