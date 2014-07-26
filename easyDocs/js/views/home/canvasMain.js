define([
  'jquery',
  'underscore',
  'backbone',
  // Pull in the Collection module from above
  'collections/templates',
  'text!templates/home/canvas-main.html'
], function($, _, Backbone, TemplatesCollection, mainHomeTemplate){

  var MainHomeView = Backbone.View.extend({
    el: $("#canvas-main"),

    initialize: function(){

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
