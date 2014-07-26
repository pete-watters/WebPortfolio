define([
  'jquery',
  'underscore',
  'backbone',
  'text!templates/home/top-section.html'
], function($, _, Backbone, topSectionTemplate){

  var TopSectionView = Backbone.View.extend({
    el: $("#top-section"),
     render: function(){
      this.$el.html(topSectionTemplate);
            $("#welcomemsg").welcomeMessage(welcomeMessage_Data);
  //        $("#welcomemsg").welcomeMessage(welcomeMessage_Data).append('<br /><br /><a id="getStarted_tooltip"  class="btn btn-primary btn-large" href="#" rel="tooltip" title="Click here to get started">Get Started</a>');
        
  //        $("#welcomemsg").append('<a id="getStarted_popover" href="#" class="btn btn-large btn-danger" rel="popover" data-content="And heres some amazing content. Its very engaging. right?" data-original-title="A Title">Click to toggle popover</a>');
         
          $('#getStarted_tooltip').tooltip();
           $('#getStarted_popover').popover();
          
    }
  });
  return TopSectionView;
});
