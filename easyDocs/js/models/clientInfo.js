define([
  'underscore',
  'backbone'
], function(_, Backbone) {
  var DocumentsModel = Backbone.Model.extend({
    defaults: {
      id: 1,
      name: "Peter Watters",
      company: "Nova LTD",
      lastGenerateDocument: "document",
      documentCount: 154,
      favouriteCount: 248,
      reportedCount: 412,
      profilePicture: ""
    },
    initialize: function(){      
      //this.on('all', function(e){console.log(this.get('name') + "Model event: " + e); });
     // console.log(documents.attributes);
    }
    
  });

  return DocumentsModel;

});
