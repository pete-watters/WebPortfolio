define([
  'jquery',
  'underscore',
  'backbone',
  'models/templates'
], function($, _, Backbone, TemplatesModel){
  var TemplatesCollection = Backbone.Collection.extend({
    model: TemplatesModel,
    //    localStorage: new Store('documents-backbone'),
    initialize: function(){     
      //this.on('all', function(e){console.log(this.get('name') + "Collection event: " + e); });
    }
  });

  return TemplatesCollection;
});
