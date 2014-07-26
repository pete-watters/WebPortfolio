define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/widgets/googleChart.html'

], function($, _, Backbone, googleChartWidgetTemplate){
  var googleChartWidgetView = Backbone.View.extend({
    el: $("#myfolder-chart"),
    initialize: function(){

    },
    exampleBind: function( model ){
      //console.log(model);
    },
    render: function(){
      var data = {};
      var compiledTemplate = _.template( googleChartWidgetTemplate, data );
      this.$el.html( compiledTemplate ); 
    }
  });
  return googleChartWidgetView;
});
