define([
  'underscore',
  'backbone'
], function(_, Backbone) {
  var QuestionsModel = Backbone.Model.extend({
    defaults: {
      title: "undefined", 
      description: "undefined", 
      answered_by:"undefined", 
      date:"undefined",
      answer:"undefined"
    },
    initialize: function(){      
      //this.on('all', function(e){console.log(this.get('name') + "Model event: " + e); });
     // console.log(documents.attributes);
    }
    
  });


  return QuestionsModel;

});
