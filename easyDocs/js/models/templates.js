define([
  'underscore',
  'backbone'
], function(_, Backbone) {
  var TemplatesModel = Backbone.Model.extend({
    defaults: {
      title: "undefined", 
      description: "undefined", 
      creator:"undefined", 
      partner:"undefined",
      downloads:"undefined", 
      thumbnailAlt:"undefined", 
      thumbnailLink:"undefined"
    },
    initialize: function(){      
      //this.on('all', function(e){console.log(this.get('name') + "Model event: " + e); });
     // console.log(documents.attributes);
    }
    
  });


  return TemplatesModel;

});
