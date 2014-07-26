// Filename: views/projects/list
define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/admin/list.html'
], function($, _, Backbone, userListTemplate){
  var UserListView = Backbone.View.extend({
    el: $("#canvas"),
    initialize: function(){
    },
    render: function(){
      var data = {};
      var compiledTemplate = _.template( userListTemplate, data );
      this.$el.html( compiledTemplate ); 
    }
  });
  return UserListView;
});
