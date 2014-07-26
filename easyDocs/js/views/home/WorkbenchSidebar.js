define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/home/WorkbenchSidebar.html'
], function($, _, Backbone, workbenchSidebarTemplate){

  var WorkbenchSidebarView = Backbone.View.extend({
    el: $("#workbench-sidebar"),
    render: function(){
      this.$el.html(workbenchSidebarTemplate);
    }
  });
  return WorkbenchSidebarView;
});
