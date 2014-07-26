define([
  'jquery',
  'underscore',
  'backbone',
  'models/questions'
], function($, _, Backbone, QuestionsModel){
  var QuestionsCollection = Backbone.Collection.extend({
    model: QuestionsModel,
//    localStorage: new Store('documents-backbone'),

    initialize: function(){
     
      //this.on('all', function(e){console.log(this.get('name') + "Collection event: " + e); });
    }

  });
  return QuestionsCollection;
});
