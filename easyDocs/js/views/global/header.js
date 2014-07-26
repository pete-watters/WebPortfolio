define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/global/header.html'
], function($, _, Backbone, headerGlobalTemplate){

  var HeaderGlobalView = Backbone.View.extend({
    el: $("#header"),
    render: function(){
      this.$el.html(headerGlobalTemplate);
    }
  });
  return HeaderGlobalView;
});
