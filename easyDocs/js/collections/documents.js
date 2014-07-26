define([
  'jquery',
  'underscore',
  'backbone',
  'models/documents'
], function($, _, Backbone, DocumentsModel){
  var DocumentsCollection = Backbone.Collection.extend({
    model: DocumentsModel,
//    localStorage: new Store('documents-backbone'),

    initialize: function(){
     
      //this.on('all', function(e){console.log(this.get('name') + "Collection event: " + e); });
    }

  });

  /* 
  var a = ({ title: "Lorem ipsum dolor sit ames", description: "Vestibulum dictum adipiscing dolor amauris libero, venenatis", creator:"pete", partner:"ESA",downloads:"34", thumbnailAlt:"thumbnail", thumbnailLink:"images/thumbs/2.jpg"});

        b = { title: "Lorem ipsum dolor sit ames", description: "Vestibulum dictum adipiscing dolor amauris libero, venenatis",creator:"pete", partner:"ESA",downloads:"34",  thumbnailAlt:"thumbnail", thumbnailLink:"images/thumbs/3.jpg"}),
        c = { title: "Lorem ipsum dolor sit ames", description: "Vestibulum dictum adipiscing dolor amauris libero, venenatis",creator:"pete", partner:"ESA",downloads:"34",  thumbnailAlt:"thumbnail", thumbnailLink:"images/thumbs/4.jpg"}), 
       d = { title: "Lorem ipsum dolor sit ames", description: "Vestibulum dictum adipiscing dolor amauris libero, venenatis",creator:"pete", partner:"ESA",downloads:"34",  thumbnailAlt:"thumbnail", thumbnailLink:"images/thumbs/5.jpg"}),
       f = { title: "Lorem ipsum dolor sit ames", description: "Vestibulum dictum adipiscing dolor amauris libero, venenatis",creator:"pete", partner:"ESA",downloads:"34",  thumbnailAlt:"thumbnail", thumbnailLink:"images/thumbs/6.jpg"});
    
      
  var documentsCollection = new DocumentsCollection([a]);

documentsCollection.add(a);
console.log(documentsCollection);


  */ 
 

  return DocumentsCollection;
});
