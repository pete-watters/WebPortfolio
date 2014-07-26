// Filename: app.js
define([
  'jquery', 
  'underscore', 
  'backbone',
  'router', // Request router.js
], function($, _, Backbone, Router){
  var initialize = function(){
    // Pass in our Router module and call it's initialize function
    Router.initialize();

              var header_Data = { title: "Logged in:", name:"jj Watters"} ; 
              var loginMenu_data = { title: "Logged in:", name:"jj Watters"} ; 
              var footer_Data = { name: "Pete1", welcomeMessage:"The home of easy, painless paperwork!"} ;
            
              $("#header").header(header_Data);
              $("#menu").loginMenu(loginMenu_data);             
              $("#footer").footer(footer_Data);
              $("#workbench-navigation").workbenchNavigation(footer_Data);
              $("#workbench-notification").workbenchNotification(footer_Data);






              

  };

  return { 
    initialize: initialize
  };
});
